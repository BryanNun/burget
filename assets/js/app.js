import React from 'react';
import ReactDOM from "react-dom";

import '../css/app.scss';
import HomePage from './pages/HomePage';
import { HashRouter, Switch, Route } from "react-router-dom";
import GalleryPage from './pages/GalleryPage';
import SlashPage from './pages/SlashPage';
import ContactPage from './pages/ContactPage';


console.log('coucou magueule');


const App = () => {
    return (
    <HashRouter>
            <main>
                <Switch>
                    <Route path="/galerie" component={GalleryPage}/>
                    <Route path="/home" component={HomePage}/>
                    <Route path="/contact" component={ContactPage}/>
                    <Route path="/" component={SlashPage}/>
                </Switch>
            </main>
    </HashRouter>
    );
};

const rootElement = document.querySelector('#app');
ReactDOM.render(<App/>, rootElement);