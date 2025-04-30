import React, { Component } from 'react';
import { BrowserRouter, Routes, Route }  from 'react-router-dom';
import Nav from '../components/Nav/Nav.jsx';
import Private from './private.jsx'
import Home from '../pages/home/index.jsx';
import Login from '../pages/login/index.jsx';
import Logado from '../pages/logado/index.jsx';
import Redux from '../pages/redux/index.jsx';

class Router extends Component {

    constructor(props) {
      super(props);
      this.state = { };
      console.log('Router - Constructed');
    }

    componentDidMount() {
      // Ajax call.
      console.log('Router - Mounted');
    }

    render() {

      console.log('Router - Rendering');

      return (
          <React.Fragment>
            <BrowserRouter>
              <Nav />
              <Routes>
                <Route exact path="/" element={ <Home /> } />
                <Route exact path="/logado" element={
                  <Private>
                    <Logado />
                  </Private> 
                } />
                <Route exact path="/login" element={ <Login /> } /> 
                <Route exact path="/redux" element={ <Redux /> } /> 
                <Route path="*" element={<h1>404</h1>} />
              </Routes>
            </BrowserRouter>
          </React.Fragment>
        );
    }
}

export default Router;