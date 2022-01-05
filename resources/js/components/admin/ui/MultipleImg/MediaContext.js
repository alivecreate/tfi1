import React, { Component, useState, useEffect, createContext } from 'react'

const GLOBAL = require('../../../../Global');
const MediaContext = React.createContext();

export const MediaProvider = (props) => {

    const [medias, setMedias] = React.useState([]);
    const [productImageArray, setProductImageArray] = React.useState([]);
    
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
        resp ++;
        })
        console.log('res-'+ i + 1  +'total-'+ totalFiles + 'progress - ' + progress);        
    }
  }
  
    const productFileUpload = (e) => {

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
      
  const productFileSave = (e) => { e.preventDefault();
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

    for (var i = 0; i < totalFiles; i++) {

      const formData = new FormData();
      formData.append('image', file[i]);
      formData.append('post_key', post_key);
      
      formData.append('image_type', document.querySelector('.image_type').value);
      formData.append('media_id', document.querySelector('.media_id').value);
      formData.append('image_alt', document.querySelector('.image_alt').value);
      formData.append('image_title', document.querySelector('.image_title').value);

      axios.post(GLOBAL.API + 'media/media-store', formData, options)
        .then(res => {
          console.log(res.data);
          var response = Math.floor ( (resp * 100) / totalFiles );
          setProgress(response);
        
          $("#productImageForm").trigger('reset'); 
        if (i === totalFiles) {
            getProductImages();
           setIsLoadding('disabled');
           onClickClear();
       }
        resp ++;
        })
      toastr.success('Product Image Added...')

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

async function getProductImages(){
  var mediaId = document.querySelector('.media_id').value;
  await axios.get(GLOBAL.API + 'media/get-product-images/'+mediaId)
    .then(res => {
          setProductImageArray(res.data);
  })
}


async function updateProductImage(e) {
  e.preventDefault();

  alert('test'+e.target.image_alt.value);
  const formData = new FormData();
  formData.append('image_alt', e.target.image_alt.value);
  formData.append('image_title', e.target.image_title.value);

  axios.post(GLOBAL.API + 'media/update-product-image', formData)
  .then(res => {
    if(res.data == 'success'){
      alert('1');
      toastr.success('Product Image Added...')
        getMedias();
        console.log('done');  
    }
    else if(res.data == 'not-exists'){
      alert('0');

        console.log('file Already deleted');
    }
  })
}

async function deleteMedia(e) {
  e.preventDefault();
  var delid = e.target.delid.value;
  await axios.get(GLOBAL.API + 'media/media-delete/'+delid)
  .then(res => {
      console.log(res.data);
      if(res.data == 'success'){
        toastr.error('Image Content Deleted...')
          getProductImages();
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
async function updateImageData(e) {
    e.preventDefault();
    var image_alt = e.target.image_alt.value;
    var image_title = e.target.image_title.value;
    var id = e.target.id.value;

    const formData = new FormData();
    formData.append('image_alt', image_alt);
    formData.append('image_title', image_title);
    formData.append('id', id);
  
    axios.post(GLOBAL.API + 'media/update-image-data', formData)

    .then(res => {
        console.log(res.data);
        if(res.data == 'success'){
            // getProductImages();
            
            toastr.success('Image Content Updated...')
            
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

      getProductImages();
    }, [])

    return(
        <MediaContext.Provider value={{ 
                medias, setMedias, uploadMultipleFiles, isLoadding, updateImageData,
                chooseBtn, fileArrayDesp, uploadFiles, submitBtn, setSubmitBtn, deleteMedia,
                progress, setProgress, productFileUpload, productFileSave, getProductImages, 
                productImageArray, setProductImageArray, updateProductImage
            }}>
            {props.children}
        </MediaContext.Provider>
    )
}
export default MediaContext;
