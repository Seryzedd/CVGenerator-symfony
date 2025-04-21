import React, { useState } from 'react';

export default function Loader (props) {
    console.log(props);
    const hide = setShow(false);
    const show = setShow(true);
    
    return <p {...props}><i beforeUnload={hide} onLoad={show} className="fa-solid fa-spinner fa-spin-pulse"></i></p>;
}
