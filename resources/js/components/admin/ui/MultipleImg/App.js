import React, { Component } from 'react'
import { Button, Form, FormGroup, Label, Input, FormText, Progress } from 'reactstrap';
import ReactDOM from 'react-dom';

import UploadButton from './UploadButton';
import MediaDesplay from './MediaDisplay';

export default class App extends Component {
    
    
    constructor(props) {
        super(props)
        
          
      }
    

    render() {
        return (
            <div className="row">
                
                <UploadButton/>
            </div>

        )
    }
}


if (document.getElementById('media-upload-tab')) {
    ReactDOM.render(<App />, document.getElementById('media-upload-tab'));
}
if (document.getElementById('media-display')) {
    ReactDOM.render(<MediaDesplay />, document.getElementById('media-display'));
}

