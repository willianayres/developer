import React, { Component } from 'react';
import classes from './App.module.css';
import TopBar from './components/TopBar/index.js';
import ProductPreview from './components/ProductPreview/index.js';
import ProductDetails from './components/ProductDetails/index.js';
import ProductData from './utils/ProductData.js';

class App extends Component {
  state = {
    productData: ProductData,
    currentPreviewImagePos: 0,
    showHeartBeatSection: false
  }

  onColorOptionClick = (pos) => { 
    this.setState({currentPreviewImagePos: pos});
  }

  onFeatureItemClick = (pos) => {
    let updatedState = false;
    if(pos === 1) updatedState = true;
    this.setState({showHeartBeatSection: updatedState});
  }

  render() {
    return (
      <div className="App">
        <TopBar />
        <div className={classes.MainContainer}>
          <ProductPreview  currentPreviewImage={this.state.productData.colorOptions[this.state.currentPreviewImagePos].imageUrl} showHeartBeatSection={this.state.showHeartBeatSection} />
          <ProductDetails data={this.state.productData} onColorOptionClick={this.onColorOptionClick} currentPreviewImagePos={this.state.currentPreviewImagePos} onFeatureItemClick={this.onFeatureItemClick} showHeartBeatSection={this.showHeartBeatSection} />
        </div>
      </div>
    );
  }
}

export default App;
