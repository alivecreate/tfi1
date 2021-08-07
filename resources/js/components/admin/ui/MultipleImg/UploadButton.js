import React, { useState, useEffect } from 'react'
import { Button, Form, FormGroup, Label, Input, FormText, Progress } from 'reactstrap';
import ReactDOM from 'react-dom';
// import {CommonFunctions} from './CommonFunctions';
// import useCustomCounter,{handleIncrement} from './useCustomCounter';

const GLOBAL = require('../../../../Global');


const UploadButton = ({ props }) => {

  const [file, setFile] = React.useState(null);
  const [fileObj, setFileObj] = React.useState([]);
  const [fileArray, setFileArray] = React.useState([]);
  const [fileArrayDesp, setFileArrayDesp] = React.useState([]);
  const [chooseBtn, setChooseBtn] = React.useState('enabled');
  const [isLoadding, setIsLoading] = React.useState('disabled');
  const [submitBtn, setSubmitBtn] = React.useState('disabled');
  const [userId, setUserId] = React.useState(null);
  const [Progress, setProgress] = React.useState(0);

  useEffect(() => {

  })




  const handleSubmit = (e) => {
    e.preventDefault()
    // let res = this.uploadFile(this.state.file);
    let res = this.uploadFile(file);
    console.log(res.data);
  }

  const onChange = (e) => {
    // this.setState({file:e.target.files[0],progress:0});
    // progress
    setFile(e.target.files[0]);

  }

  const enableChooseBtn = () => {
    alert('click');
    setSubmitBtn('enabled');
    setChooseBtn('enabled');

  }
  const onClickClear = () => {
    setFile(null);
    setFileObj([]);
    setFileArray([]);
    setFileArrayDesp([]);
  }

  const uploadMultipleFiles = (e) => {
    if (fileArrayDesp.length == 0) {

    } else {
    }
    console.log(fileArrayDesp.length);

    fileObj.push(e.target.files);
    for (let i = 0; i < fileObj[0].length; i++) {
      fileArrayDesp.push(URL.createObjectURL(fileObj[0][i]));
      fileArray.push(fileObj[0][i]);
    }

    setFile(fileArray);
    setSubmitBtn('enabled');
    setChooseBtn('disabled');
  }

  const uploadFiles = (e) => {
    e.preventDefault();
    var d = new Date();
    var random = Math.floor(Math.random() * 9999) + 1000;
    var post_key = d.getTime() + random;

    setSubmitBtn('disabled');
    setChooseBtn('disabled');

    var totalFiles = fileObj[0].length;
    console.log('length' + totalFiles);

    setIsLoadding('enabled');
    
    for (var i = 0; i < totalFiles; i++) {

      const formData = new FormData();
      formData.append('images', file[i]);
      formData.append('post_key', post_key);


      axios.post(GLOBAL.API + 'media/media-store', formData, {
      })
        .then(res => {
          console.log(i);
          console.log(res.data);

          var elements = document.getElementsByTagName("textarea");
          for (var ii = 0; ii < elements.length; ii++) {
            elements[ii].value = "";
            if (elements[ii].type == "text") {
              elements[ii].value = "";
            }
          }

          var elements = document.getElementsByTagName("input");
          for (var ii = 0; ii < elements.length; ii++) {
            elements[ii].value = "";
            if ((elements[ii].type == "text") || (elements[ii].type == "file")) {
              elements[ii].value = "";
            }
          }
        })
      if (i == totalFiles - 1) {

        setIsLoadding('disabled');
        this.onClickClear();
        this.getPosts();
      }
    }

  }

  let isLoaddingTab, isLoadingSpinner;

  if (isLoadding == 'disabled') {
    isLoaddingTab = "d-block";
    isLoadingSpinner = "";
  } else {
    isLoaddingTab = "d-none";
    isLoadingSpinner = <div><span className="mr-4">Loading...</span> <div className="spinner-grow" style={{ width: '1rem', height: '1rem' }} role="status">
    </div></div>;
  }



  return (
    <div className="col-md-12 mb-4">


      {/* {isLoadding=='disabled' ? ( */}
      <div>

        {isLoadingSpinner}

        <div className="form-group multi-preview">
          {(fileArrayDesp || []).map(url => (
            <img src={url} key={url} alt="..." style={{ width: '40px', marginRight: '20px' }} />
          ))}
        </div>

        <div className={"tabs side-tabs nobottommargin clearfix w-100 " + isLoaddingTab}>
          <form className="form" onSubmit={() => uploadFiles()}>
            <div className="tab-content clearfix" id="">

              <button className="btn btn-success float-right" style={{ marginTop: 4 }}>
                SEND222</button>
              <input type="file" disabled={chooseBtn} className={"float-right chooseBtn"}
                onChange={(e) => uploadMultipleFiles(e)} multiple />

            </div>
          </form>
          <div>


          </div>

        </div>
      </div>

    </div>
  )
}

export default UploadButton;

// if (document.getElementById('post-tab-container')) {
//   ReactDOM.render(<PostTab />, document.getElementById('post-tab-container'));
// }
