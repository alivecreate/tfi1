import React, { Component, Fragment } from 'react'

export default class DeleteButton extends Component {
    constructor(props) {
        super(props)
        this.state = {
          }
          this.deleteMedia = this.deleteMedia.bind(this);
        }
            
    async deleteMedia(e) {
        e.preventDefault();
        
        const formData = new FormData();
        formData.append('id',this.props.delid);
        console.log(this.props.delid);

        await axios.get('http://localhost:8000/api/media/media-delete/'+this.props.delid,formData,{
            headers: {
                'Content-Type': 'multipart/form-data;boundary=----WebKitFormBoundaryyrV7KO0BoCBuDbTL',     
                'Accept' : 'application/json',
            },
        })
        .then(res => {
            console.log(res.data);
            if(res.data == 'success'){
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


    


    render() {
        return (
            
            <Fragment>
                <form method="POST" className="form" onSubmit={this.deleteMedia}>
                    <div className="delBtnBlock">
                        <button  className={this.props.classProps}><i className="fas fa-trash-alt"></i></button>
                    </div>
                </form>
            </Fragment>
        )
    }
}
