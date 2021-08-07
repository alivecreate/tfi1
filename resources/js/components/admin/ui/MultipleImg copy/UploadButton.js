import React, { Component } from 'react'
import { Button, Form, FormGroup, Label, Input, FormText, Progress } from 'reactstrap';
import ReactDOM from 'react-dom';
// import {CommonFunctions} from './CommonFunctions';
// import useCustomCounter,{handleIncrement} from './useCustomCounter';

const GLOBAL = require('../../../../Global');

export default class UploadButton extends Component {
    
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
        this.setState({file:e.target.files[0],progress:0});
    }
    
    async getPosts() {
        
        const formData = new FormData();
        formData.append('id',this.state.userId);
        await axios.post(GLOBAL.API+'user/get-posts',formData,{
            headers: {
                'Content-Type': 'multipart/form-data;boundary=----WebKitFormBoundaryyrV7KO0BoCBuDbTL',     
                'Accept' : 'application/json',
            },
        })
        .then(res => {
            console.log(res.data);
            this.setState({getPosts:res.data});
        })
    }

    componentWillMount(){

    }

    componentDidMount(){
        
    }
      
    enableChooseBtn(){
        alert('click');
        this.setState({ submitBtn:'enabled',chooseBtn:'enabled'});

    }
      onClickClear(){
          this.setState({ file:null,fileObj:[],fileArray:[],fileArrayDesp:[] });
        }
  
      uploadMultipleFiles(e) {
         if(this.state.fileArrayDesp.length == 0){
             
            // this.state.fileObj.push(e.target.files);
        }else{
            // this.setState({fileObj:[]});
            // this.state.fileObj.concat(e.target.files);
        }
        console.log(this.state.fileArrayDesp.length);

        this.state.fileObj.push(e.target.files);
          for (let i = 0; i < this.state.fileObj[0].length; i++) {
                this.state.fileArrayDesp.push(URL.createObjectURL(this.state.fileObj[0][i]));
               this.state.fileArray.push(this.state.fileObj[0][i]);
          }

          this.setState({ file: this.state.fileArray, submitBtn:'enabled',chooseBtn:'disabled'});
        //   if(i == e.target.files.length - 1 ){
        //     alert('uploaded');
            
            
        // }
      }
  
      async uploadFiles(e) {
        // alert('click');
          e.preventDefault();
        var d = new Date();
        var random = Math.floor(Math.random() * 9999) + 1000;
        var post_key = d.getTime()+random;
        // var name = document.getElementById('name').value;
        
        this.setState({ submitBtn:'disabled',chooseBtn:'disabled' });
          var totalFiles = this.state.fileObj[0].length;
          console.log('length'+totalFiles);
            this.setState({isLoadding:'enabled'});
          for(var i=0; i<totalFiles ;i ++){
            
          const formData = new FormData();
          formData.append('images',this.state.file[i]);
          formData.append('post_key',post_key);
          
  
           await axios.post(GLOBAL.API+'media/media-store',formData,{
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
    let isLoaddingTab, isLoadingSpinner,chooseBtn;
    if (this.state.isLoadding == 'disabled') {
        isLoaddingTab =  "d-block";
        isLoadingSpinner = "";
     }else{
        isLoaddingTab =  "d-none";
        isLoadingSpinner = <div><span className="mr-4">Loading...</span> <div className="spinner-grow" style={{width: '1rem', height: '1rem'}} role="status">
          
        </div></div>;
     }
     if (this.state.chooseBtn == 'disabled') {
        chooseBtn =  "disabled";
      }else{
        chooseBtn =  "";
        
      }



        return (
        <div className="col-md-12 mb-4">
            

            {/* {this.state.isLoadding=='disabled' ? ( */}
                <div>
                    
                    {isLoadingSpinner}

                    <div className="form-group multi-preview">
                        {(this.state.fileArrayDesp || []).map(url => (
                            <img src={url} key={url} alt="..." style={{width:'40px',marginRight:'20px'}}/>
                        ))}
                    </div>
            <div className={"tabs side-tabs nobottommargin clearfix w-100 " + isLoaddingTab}>
                        
                        <form className="form" onSubmit={this.uploadFiles}>
                        <div className="tab-content clearfix" id="">
                            


                            <button className="btn btn-success float-right" style={{marginTop: 4}}>
                            SEND222</button>
                            
                            <input type="file"  disabled={chooseBtn}  className={"float-right chooseBtn"}  onChange={this.uploadMultipleFiles}  multiple/>
                        
                        </div>
                        </form>

                
            <div>
                
                
                   </div>

                   </div>
                </div>
                
            </div>
        )
    }
}


if (document.getElementById('post-tab-container')) {
    ReactDOM.render(<PostTab />, document.getElementById('post-tab-container'));
}
