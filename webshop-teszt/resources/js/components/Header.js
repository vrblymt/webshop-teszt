import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Link} from 'react-router-dom';

export default class Header extends Component {
    render() {
        return (
    <nav className="navbar navbar-expand-md navbar-light bg-blue shadow-sm">
        <div className="container">
            <Link className="nav-link" to="/champions">Champions</Link>
            <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
            </button>

            <div className="collapse navbar-collapse" id="navbarSupportedContent">
            <ul className="navbar-nav mr-auto">
                <Link className="nav-link" to="/toplist">Toplist</Link>
                <Link className="nav-link" to="/ranks">Ranks</Link>
            </ul>
            </div>
        </div>
    </nav>
        );
    }
}



