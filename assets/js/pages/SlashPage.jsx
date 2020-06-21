import React from 'react';
import { NavLink } from 'react-router-dom';
import { AnimatePresence, motion } from 'framer-motion';


const SlashPage = (props) => {


    return (
        <>
            <motion.body 
                initial={{ opacity: 0 }} 
                animate={{ opacity: 2 }}
                transition={{ duration: 5 }}
                exit={{ opacity: 0 }}
                className="accueil">
                <h1 className="title">Sylvie</h1>
                <h1 className="title">Burget</h1>
                <NavLink className="acces" to="/galerie">Accéder au site</NavLink>
            </motion.body>
        </>
    );
}

export default SlashPage;