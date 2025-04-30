import React, { Component } from 'react';
import axios from 'axios';

class Form extends Component {

	state = { 
		name: '',
		email: ''
	};

	/*
	constructor() {
		super();
	}
	*/

	changeHandler = e => {
		this.setState({
			[e.target.name] : e.target.value
		});
	};

	onSubmitHandler = (e) => {
		console.log('state', this.state);
		e.preventDefault();
	};

	componentDidMount() {
		/*
		fetch('http://localhost:3004/posts')
		.then((res) => {
			return res.json();
		})
		.then((myJson) => {
			console.log(myJson);
		});
		*/
		axios.get('http://localhost:3004/posts')
		.then(res => console.log(res.data));
	}

	render(){
		return(
			<React.Fragment>
				<center>
					<div className="col-md-6">
						<form className="form-group">
							<input onChange={ e => this.changeHandler(e) } name="name" type="text" placeholder="name" className="form-control" value={this.state.name} />
							<input onChange={ e => this.setState({email: e.target.value}) } type="email" placeholder="e-mail" className="form-control" value={this.state.email} />
							<hr />
							<button onClick={ (e) => this.onSubmitHandler(e) } className="btn btn-success">Submit</button>
						</form>
					</div>
				</center>
			</React.Fragment>
			);
	}

}

export default Form;