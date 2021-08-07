import React, { Component, useState, useContext } from 'react'
import MediaContext from './MediaContext';
import ProgressBar from 'react-bootstrap/ProgressBar'
import DeleteButton from './DeleteButton';
const GLOBAL = require('../../../../Global');

const MediaModal = (props) => {
    // const [name, setName] = useContext(MediaContext);

    const { medias, setMedias, uploadMultipleFiles,
        isLoadding, chooseBtn, fileArrayDesp, uploadFiles,
        submitBtn, setSubmitBtn, deleteMedia,
         progress, setProgress } = useContext(MediaContext);


    let isLoaddingTab, isLoadingSpinner;
    if (isLoadding == 'disabled') {
        isLoaddingTab = "d-block";
        isLoadingSpinner = "";
    } else {
        isLoaddingTab = "d-none";
        isLoadingSpinner = <div><span className="mr-4">Loading...</span> <div className="spinner-grow" style={{ width: '1rem', height: '1rem' }} role="status">
        </div></div>;
    }

    const now = progress;


    let progressInstance;
    if(progress == 0) {
    }else{
        progressInstance = <ProgressBar className="col-lg-6 col-sm-6 float-right" now={now} label={`${now}%`} />;
        if(progress == 100){
            
              setTimeout(function(){      
                progressInstance = <ProgressBar className="col-lg-6 col-sm-6 float-right" now={now} label={`${now}%`} />;
                setProgress(0);
                console.log('completed 100');
            }, 2000);
        }
    }
    
    // render(progressInstance);

    const selectImage = (e)=>{
        
        var imgFileXs = event.target.attributes.getNamedItem('src').value;
        var imgFile = imgFileXs.replace('xs','md');
          
        var e = $('#compose-textarea');
        e.summernote();
        e.summernote('focus');
        e.summernote('insertImage', imgFile ,imgFile);

    }   
    return (
        <>

            <div class="modal-body media-modal-body" id="media-body">
                <div class="col-md-12">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title float-left">
                                <i class="fas fa-edit"></i>
                                Media Panel (Add Multiple Images)
                                
                              </h3>
                                    {progressInstance}
                                    
                        </div>
                        <div class="card-body">
                            <div className="row">
                                <div className="col-5 col-sm-3">
                                    <div className="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a className="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">New Media</a>
                                        <a className="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">All Media</a>
                                    </div>
                                </div>
                                <div className="col-7 col-sm-9">

                                    <div className="tab-content" id="vert-tabs-tabContent">
                                        <div className="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                            <div id="media-upload-tab">
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
                                                            <form className="form" onSubmit={uploadFiles}>
                                                                <div className="tab-content clearfix" id="">

                                                                    <button className="btn btn-success float-right" style={{ marginTop: 4 }}>
                                                                        SEND</button>
                                                                    <input type="file" className={"float-right chooseBtn"}
                                                                        onChange={(e) => uploadMultipleFiles(e)} multiple />

                                                                </div>
                                                            </form>
                                                            <div>


                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div className="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">

                                            <div id="media-display">
                                                <div className="row">
                                                    {
                                                        (medias || []).map(media => (

                                                            <div className="col-md-2 media-card" key={media.id}>
                                                                <div className="card mb-2">
                                                                    <img className="card-img-top w-100 mb-2" data-dismiss="modal" key={media.image}
                                                                        alt="300x200" onClick={(e)=>selectImage()}
                                                                        src={GLOBAL.BASE_URL + 'web/media/xs/' + media.image} data-holder-rendered="true" />
                                                                    {/* <DeleteButton delid={media.id} classProps="btn btn-danger del-modal float-right" /> */}

                                                                    <form method="POST" className="form" onSubmit={deleteMedia}>
                                                                        <div className="">
                                                                            <input type="hidden" name="delid" value={media.id} key={media.id} />
                                                                            <button><i className="fas fa-trash-alt"></i></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        ))
                                                    }
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </>
    )

}


// import React, {useContext} from 'react'

// import {mycontext} from './MediaContext';

// function MediaModal(props) {

// // const [randomNo, setRandomNo] = useContext(MediaContext);
// // const no = useContext(MediaContext);

//         return (
//             <>
//             <mycontext.Consumer>
//                 <h2>Con A</h2>
//                 <h1>{data => <h3>{data.name}</h3>}</h1>
//                 </mycontext.Consumer>
//             </>

//         ) 
//     }


export default MediaModal;
