import React, { Component, useState, useEffect, createContext } from 'react'

const GLOBAL = require('../../../../Global');
const MediaContext = React.createContext();

export const MediaProvider = (props) => {

    const [medias, setMedias] = React.useState([]);
    
    const [file, setFile] = React.useState(null);
    const [fileObj, setFileObj] = React.useState([]);
    const [fileArray, setFileArray] = React.useState([]);
    const [fileArrayDesp, setFileArrayDesp] = React.useState([]);

    const [chooseBtn, setChooseBtn] = React.useState('enabled');
    const [isLoadding, setIsLoadding] = React.useState('disabled');
    const [submitBtn, setSubmitBtn] = React.useState('disabled');
    const [progress, setProgress] = React.useState(0);
    const [totalProgress, setTotalProgress] = React.useState(0);

 
  
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
        
        setProgress(0);
        setTotalProgress(0);
        setTotalProgress(fileObj[0].length);
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

    const options = {
        onUploadProgress: (progressEvent) => {
            const {loaded, total} = progressEvent;
            let percent = Math.floor ( (loaded * 100) / total );
            console.log ( `${loaded}kb of ${total}kb | ${percent}%` );
        }
    }

    var d = new Date();
    var random = Math.floor(Math.random() * 9999) + 1000;
    var post_key = d.getTime() + random;
    setSubmitBtn('disabled');
    setChooseBtn('disabled');

    var totalFiles = fileObj[0].length;
    console.log('length' + totalFiles);

    setIsLoadding('enabled');
    var resp = 1 ;

    document.getElementById('vert-tabs-profile-tab').click();
    for (var i = 0; i < totalFiles; i++) {

      const formData = new FormData();
      formData.append('images', file[i]);
      formData.append('post_key', post_key);

      axios.post(GLOBAL.API + 'media/media-store', formData, options)
        .then(res => {
          console.log(res.data);
            
        //   var response = Math.floor ( (loaded * 100) / total );
          var response = Math.floor ( (resp * 100) / totalFiles );
        //   var response = (resp) * 100 / totalFiles;
          setProgress(response);
        
          //   100/2

        console.log('111=' + response);

          console.log('resp' +  resp + 1);

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

                     
        if (i === totalFiles) {
            getMedias();
           setIsLoadding('disabled');
           onClickClear();
       }
          
        // setProgress(progress => progress);
        // console.log('pp -'+progress);
        
        resp ++;
        })
       
        console.log('res-'+ i + 1  +'total-'+ totalFiles + 'progress - ' + progress);
        
        
    }
  }
  
  async function getMedias() {
    axios.get(GLOBAL.API+'media/get-media',{
    })
    .then(res => {
        console.log(res.data);
        setMedias(res.data);
        
        // setMovies(prevMovies => [...prevMovies, {name: name, price: price, id : id}])

    })
}
async function deleteMedia(e) {
    e.preventDefault();
    var delid = e.target.delid.value;
    await axios.get(GLOBAL.API + 'media/media-delete/'+delid)
    .then(res => {
        console.log(res.data);
        if(res.data == 'success'){
            getMedias();
            console.log('done');  
        }
        else if(res.data == 'not-exists'){
            console.log('file Already deleted');
        }
        else{
            console.log('failed');
        }
    })
}

    useEffect(() => {

        getMedias();
    }, [])

    return(
        <MediaContext.Provider value={{ 
                medias, setMedias, uploadMultipleFiles, isLoadding,
                chooseBtn, fileArrayDesp, uploadFiles, submitBtn, setSubmitBtn, deleteMedia,
                progress, setProgress
            }}>
            {props.children}
        </MediaContext.Provider>
    )
}
export default MediaContext;
