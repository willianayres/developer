import React, { Component } from 'react';
import Counter from '../Counter/Counter.jsx';

class Counters extends Component {

	state = {
		counters: [
			{id: 1, value: 3},
			{id: 2, value: 0},
			{id: 3, value: 0},
			{id: 4, value: 0},
			{id: 5, value: 0}
		]
	};

	/*
	constructor() {
		super();
	}
	*/

	handelDelete = (id) => {
		const newCounters = this.state.counters.filter(c => c.id !== id);
		this.setState({counters: newCounters});
	}

	render(){
		return(
			<React.Fragment>
				{this.state.counters.map(counters => 
					<Counter key={counters.id} counterId={counters.id} value={counters.value} onDelete={this.handelDelete}>
						<h3>Title {counters.id}</h3>
					</Counter>)
				}
			</React.Fragment>
			);
	}

}

export default Counters;