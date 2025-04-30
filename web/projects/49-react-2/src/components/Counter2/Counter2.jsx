import React, { Component } from 'react';
import { connect } from 'react-redux';

class Counter2 extends Component {

	state = {
		Number: 1
	};

	componentDidMount () {
		//console.log('prop', this.props);
		this.props.store.subscribe(() => {
			this.setState({
				Number:this.props.store.getState().Number
			});
		});

		this.setState({
			Number:this.props.Number
		});
	}

	/*
	constructor() {
		super();
	}
	*/

	render(){
		return(
			<React.Fragment>
				<div className="card text-white bg-danger mb-3">
					<div className="card-header">Counter</div>
					<div className="card-body">
						<h1 className="card-title">Number : {this.state.Number}</h1>
					</div>
				</div>
			</React.Fragment>
		);
	}
}

const mapStateToProps = (state) => ({
	Number: state.Number,
});

export default connect(mapStateToProps) (Counter2);