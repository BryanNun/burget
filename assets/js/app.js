import React from 'react';
import ReactDOM from "react-dom";

import '../css/app.scss';
import AboutPage from './pages/AboutPage';
import { HashRouter, Switch, Route } from "react-router-dom";
import GalleryPage from './pages/GalleryPage';
import SlashPage from './pages/SlashPage';
import ContactPage from './pages/ContactPage';
import { AnimatePresence, motion } from 'framer-motion';


console.log('coucou magueule');


const App = () => {
    return (
    <HashRouter>
            <main>
                <AnimatePresence>
                    <Switch>
                        <Route path="/galerie" component={GalleryPage}/>
                        <Route path="/about" component={AboutPage}/>
                        <Route path="/contact" component={ContactPage}/>
                        <Route path="/" component={SlashPage}/>
                    </Switch>
                </AnimatePresence>
            </main>
    </HashRouter>
    );
};

const rootElement = document.querySelector('#app');
ReactDOM.render(<App/>, rootElement);