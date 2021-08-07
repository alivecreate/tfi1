import React, { Component } from 'react'
import { Button, Form, FormGroup, Label, Input, FormText, Progress } from 'reactstrap';
import ReactDOM from 'react-dom';
import DeleteButton from './DeleteButton';

const GLOBAL = require('../../../../Global');

export default class MediaDisplay extends Component {
    
    
    constructor(props) {
        super(props)
        this.state = {
            file: [null],
            fileObj : [],
            fileArray : [],
            fileArrayDesp: [],
            chooseBtn:'enabled',
            submitBtn:'disabled',
            userId:'',
            userEmail:'',
            userName:'',
            userAvatar:'',
            post:'',
            getPosts:[],
            isLoadding:'disabled',
          }
          
        this.input = React.createRef();
        this.uploadMultipleFiles = this.uploadMultipleFiles.bind(this)
        this.uploadFiles = this.uploadFiles.bind(this)
        this.onClickClear = this.onClickClear.bind(this)
      }
    
    
      async handleSubmit(e){
        e.preventDefault() 
        let res = await this.uploadFile(this.state.file);
        console.log(res.data);  
    }
    onChange(e) {
        this.setState({file:e.target.files[0],progress:0})
    }
    
    async getPosts() {
        
        const formData = new FormData();
        formData.append('id',this.state.userId);
        await axios.get(GLOBAL.API+'media/get-media',formData,{
        })
        .then(res => {
            console.log(res.data);
            this.setState({getPosts:res.data});
        })
    }

    componentDidMount(){
        this.getPosts();
        
    }
      

      onClickClear(){
          this.setState({ file:null,fileObj:[],fileArray:[],fileArrayDesp:[] });
        }
  
      uploadMultipleFiles(e) {
  
        console.log(this.state.fileArrayDesp.length);
          this.state.fileObj.push(e.target.files)
          for (let i = 0; i < this.state.fileObj[0].length; i++) {
               this.state.fileArrayDesp.push(URL.createObjectURL(this.state.fileObj[0][i]))
              this.state.fileArray.push(this.state.fileObj[0][i])
          }
          this.setState({ file: this.state.fileArray, submitBtn:'enabled'});
      }
  
      async uploadFiles(e) {
          e.preventDefault();
        var d = new Date();
        var random = Math.floor(Math.random() * 9999) + 1000;
        var post_key = d.getTime()+random;
        var post = document.getElementById('post-image').value;
        
        this.setState({ submitBtn:'disabled',chooseBtn:'disabled' });
          var totalFiles = this.state.fileObj[0].length;
          console.log('length'+totalFiles);
            this.setState({isLoadding:'enabled'});
          for(var i=0; i<totalFiles ;i ++){
            
          const formData = new FormData();
          formData.append('post',post);
          formData.append('images',this.state.file[i]);
          formData.append('post_key',post_key);
          formData.append('user_id',this.state.userId);
          
  
           await axios.post(GLOBAL.API+'user/post-image',formData,{
              headers: {
                  'Content-Type': 'multipart/form-data;boundary=----WebKitFormBoundaryyrV7KO0BoCBuDbTL',     
                  'Accept' : 'application/json',
              },
          })
          .then(res => {
              console.log(i);
              console.log(res.data);

              var elements = document.getElementsByTagName("textarea");
              for (var ii=0; ii < elements.length; ii++) {
                elements[ii].value = "";
              if (elements[ii].type == "text") {
                elements[ii].value = "";
              }
            }
            
            var elements = document.getElementsByTagName("input");
            for (var ii=0; ii < elements.length; ii++) {
                elements[ii].value = "";
              if ((elements[ii].type == "text") || (elements[ii].type == "file")) {
                elements[ii].value = "";
              }
            }
          })
          if(i == totalFiles-1){

            this.setState({isLoadding:'disabled'});
            this.onClickClear();        
            this.getPosts();
          }
      }

}

    render() {
    let isLoaddingTab, isLoadingSpinner;
    if (this.state.isLoadding == 'disabled') {
        isLoaddingTab =  "d-block";
        isLoadingSpinner = "";
     }else{
        isLoaddingTab =  "d-none";
        isLoadingSpinner = <div><span className="mr-4">Loading...</span> <div className="spinner-grow" style={{width: '1rem', height: '1rem'}} role="status">
          
        </div></div>;
     }


        return (
            <div className="row">
                
                    {(this.state.getPosts || []).map(getPost => (
                        <div className="col-md-2 media-card"   key={getPost.id}>                         
							<div className="card mb-2">
                                <img className="card-img-top w-100 mb-2" data-dismiss="modal"  key={getPost.image} 
                                     alt="300x200" 
                                    src={GLOBAL.BASE_URL+'web/media/xs/'+getPost.image} data-holder-rendered="true"/>
                                
                                        <DeleteButton delid={getPost.id} classProps="btn btn-danger del-modal float-right" />
                            </div>
                        </div>

                    ))}
                </div>

        )
    } 
}

