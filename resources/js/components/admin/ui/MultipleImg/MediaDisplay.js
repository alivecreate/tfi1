import React, { useEffect } from 'react'
import { Button, Form, FormGroup, Label, Input, FormText, Progress } from 'reactstrap';
import ReactDOM from 'react-dom';
// import DeleteButton from './DeleteButton';

const GLOBAL = require('../../../../Global');

const MediaDisplay = ({props}) => {
    
  const [file, setFile] = React.useState(null);
  const [fileObj, setFileObj] = React.useState([]);
  const [fileArray, setFileArray] = React.useState([]);
  const [fileArrayDesp, setFileArrayDesp] = React.useState([]);
  const [chooseBtn, setChooseBtn] = React.useState('enabled');
  const [submitBtn, setSubmitBtn] = React.useState('disabled');
  const [userId, setUserId] = React.useState(null);
  const [isLoadding, setIsLoading] = React.useState('disabled');
  const [Progress, setProgress] = React.useState(0);
  
  

  const [Posts, setPosts] = React.useState([]);

  const [randomNo, setRandomNo] = React.useState(null);
  
    
    const getPosts = () => {
        const formData = new FormData();
        formData.append('id',userId);
        axios.get(GLOBAL.API+'media/get-media',formData,{
        })
        .then(res => {
            console.log(res.data);
            setPosts(res.data);
        })
    }
    
  useEffect(() =>{
    getPosts();
  },[randomNo]);

      

     const onClickClear = () => {
          setFile(null);
          setFileObj([]);
          setFileArray([]);
          fileArrayDesp([]);
          setRandomNo(Math.random() * Math.floor(50));
          
        }
  
   
  
    let isLoaddingTab, isLoadingSpinner;
    if (isLoadding == 'disabled') {
        isLoaddingTab =  "d-block";
        isLoadingSpinner = "";
     }else{
        isLoaddingTab =  "d-none";
        isLoadingSpinner = <div><span className="mr-4">Loading...</span> <div className="spinner-grow" style={{width: '1rem', height: '1rem'}} role="status">
          
        </div></div>;
     }

 
        return (
              <div className="row">
                
                    {(Posts || []).map(getPost => (
                        <div className="col-md-2 media-card"   key={getPost.id}>                         
							<div className="card mb-2">
                                <img className="card-img-top w-100 mb-2" data-dismiss="modal"  key={getPost.image} 
                                     alt="300x200" 
                                    src={GLOBAL.API+'public/web/media/xs/'+getPost.image} data-holder-rendered="true"/>
                                
                                        {/* <DeleteButton delid={getPost.id} classProps="btn btn-danger del-modal float-right" /> */}
                            </div>
                        </div>

                    ))}
                </div>

        )
}

export default MediaDisplay;

