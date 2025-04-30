import React from 'react';

import classes from './style.module.css';

const TopBar = (props) => {
	return (
    <header>
  		<nav className={classes.TopBar}>
        <img src="https://i.dlpng.com/static/png/197684_preview.png" alt="Amazon Logo" />
      </nav>
    </header>
	);
}

export default TopBar;