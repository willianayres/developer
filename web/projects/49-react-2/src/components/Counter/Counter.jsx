import React, { Component } from 'react';

class Counter extends Component	{
	
	state = {
		count: this.props.value,
		tags: ['tag1', 'tag2', 'tag3']
	};

	styles = {
		fontSize: 16
	}

	/*
	constructor(props) {
		super(props);
	}
	*/

	componentDidUpdate(prevProps, prevState) {
		console.log('prevState', prevState);
		console.log('prevProps', prevProps);
		if(prevProps.count !== this.props.count) {
			// Ajax.
			console.log('updated');
		}
	}

	componentWillUnmount() {
		console.log('Counter Unmount');
	}

	handelIncrement = (args) => {
		this.setState({
			count: this.state.count + 1
		});
	}

	render(){
		return(
			<React.Fragment>
				{this.props.children}
				<span className={this.getClass()}>{this.change()}</span>
				<button onClick={() => this.handelIncrement()} className="btn btn-primary">Increment</button>
				<button onClick={() => this.props.onDelete(this.props.counterId)} className="btn btn-danger btn-sm m-2">Delete</button>
				{(this.state.tags.length === 0) ? <p>There are no tags</p> : <ul>{this.state.tags.map(tag => <li key={tag}>{tag}</li>)}</ul>};
			</React.Fragment>
			);
	}

	getClass() {
		let classes = "badge m-2 badge-";
		classes += this.state.count === 0 ? "warning" : "primary";
		return classes;
	}

	change() {
		return this.state.count === 0 ? 'Zero' : this.state.count;
	}
}

export default Counter;