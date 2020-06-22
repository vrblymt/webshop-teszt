import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Switch, Route, BrowserRouter as Router} from 'react-router-dom';


import Champions from './Pages/Champions';
import Home from './Pages/Home';
import Ranks from './Pages/Ranks';
import Toplist from './Pages/Toplist';
import Header from './Header';

export default class Example extends Component {
    render() {
        return (
            <div>
                <Router>
                <Header/>
                <div className="container">
                    
                        <div className="row justify-content-center">
                        <div className="col-md-8">
                                <Switch>
                                    <Route exact path="/" component={Home} />
                                    <Route exact path="/champions" component={Champions}  />
                                    <Route exact path="/ranks" component={Ranks}/>
                                    <Route exact path="/toplist" component={Toplist}/>
                                </Switch>
                        </div>
                    </div>
                </div>
                </Router>
            </div>
            
        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<Example />, document.getElementById('app'));
}
