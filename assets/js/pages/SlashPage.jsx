import React from 'react';
import { NavLink } from "react-router-dom";


const SlashPage = (props) => {


    return (
        <>
            <body className="accueil">
                <h1 className="title">Sylvie</h1>
                <h1 className="title">Burget</h1>
                <NavLink className="acces" to="/galerie">Accéder au site</NavLink>
            </body>
        </>
    );
}

export default SlashPage;