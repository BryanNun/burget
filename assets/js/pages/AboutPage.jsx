import React from 'react';
import Navbar from '../components/NavBar';
import { motion } from 'framer-motion';

const AboutPage = (props) => {
    return ( 
        <>
        <motion.div
            initial={{ opacity: 0 }} 
            animate={{ opacity: 2 }}
            transition={{ duration: 5 }}
            exit={{ opacity: 0 }}>
                <Navbar/>
                <h1>A propos</h1>
        </motion.div>
        </>
    );
}

export default AboutPage;