import React, { Component } from 'react';
import { connect } from 'react-redux';

class Datalist extends Component {

	state = {
		data: ['']
	};

	/*
	constructor() {
		super();
	}
	*/

	componentDidMount () {
		//console.log('prop', this.props);
		this.props.store.subscribe(() => {
			this.setState({
				data:this.props.store.getState().Data
			});
		});

		this.setState({
			data:this.props.Data
		});
	}

	render(){
		return(
			<React.Fragment>
				<div className="card text-white bg-primary mb-3">
					<div className="card-header">Data List</div>
					<div className="card-body">
						<h5 className="card-title">List of Data</h5>
						
						{
							this.state.data.map(data => <p key={data} className="card-text">{data}</p>)
						}
					</div>
				</div>
			</React.Fragment>
		);
	}
}

const mapStateToProps = (state) => ({
	Data: state.Data
});

export default connect(mapStateToProps) (Datalist);