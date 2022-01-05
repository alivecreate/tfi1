import React, { Component, useState, useContext, useEffect } from 'react'
import $ from "jquery";

class JqueryComponent extends Component {
    componentDidMount(){
        $('.btn-success').click(function (e) { 
            alert('77');
        });
    }
    render() { 
        return (  
            <div className="btn-success">hello</div>
        );
    }
}
 
export default JqueryComponent;