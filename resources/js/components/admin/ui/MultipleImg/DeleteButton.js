import React, { Component, useState, useContext } from 'react'
import MediaContext from './MediaContext';

const DeleteButton = (props) => {
    
    const { deleteMedia } = useContext(MediaContext);
    return (

        <>
            <form method="POST" className="form" onSubmit={deleteMedia}>
                <div className="">
                    <button><i className="fas fa-trash-alt"></i></button>
                </div>
            </form>
        </>
    )

}

export default DeleteButton;