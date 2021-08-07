import React, { useState, useEffect, createContext } from 'react'
import axios from 'axios';
const GLOBAL = require('../../../../Global');

export const MediaContext = React.createContext();
  
export const MediaData = props => {
    // const [mediaData, setMediaData] = useState([]);
    // const { getUserData, value2 } = React.useContext(AuthContext);

const [file, setFile] = React.useState(null);
const [fileObj, setFileObj] = React.useState([]);
const [fileArray, setFileArray] = React.useState([]);
const [fileArrayDesp, setFileArrayDesp] = React.useState([]);
const [chooseBtn, setChooseBtn] = React.useState('enabled');
const [submitBtn, setSubmitBtn] = React.useState('disabled');
const [userId, setUserId] = React.useState(null);
const [isLoadding, setIsLoading] = React.useState('disabled');
const [Progress, setProgress] = React.useState(0);


const [medias, setMedias] = React.useState([]);
const [testData, setTestData] = React.useState('kkk');

const [randomNo, setRandomNo] = React.useState(55555);

    useEffect(() => {

        async function getMedias() {
            const formData = new FormData();
            formData.append('id',userId);
            axios.get(GLOBAL.API+'media/get-media',formData,{
            })
            .then(res => {
                console.log(res.data);
                setMedias(res.data);
            })
        }
        getMedias();
    }, [])
    const no = 44;
  const data= {
    // testData: testData,
    // mediaData:mediaData,
    // getMedias:this.getMedias,
    // medias: this.medias,
    // setMedias: this.setMedias,
  }
    return (
        <>
        <h2>Provider</h2>
        <MediaContext.Provider value={{name:"krishna",age:27}}>
            {props.children}
        </MediaContext.Provider>

        <p>close</p> 
        </>

    );
}

export default MediaData;

