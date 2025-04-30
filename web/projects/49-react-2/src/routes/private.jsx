import React from 'react';
import { Navigate } from 'react-router-dom';

export default function Private({children}) {
  var user = false;

  return (
      <React.Fragment>
        {(user) ? children : <Navigate to="/login" />}
      </React.Fragment>
    );
}