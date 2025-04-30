import React from 'react';
import Main from '../../components/Main/Main.jsx';
import Counter2 from '../../components/Counter2/Counter2.jsx';
import Datalist from '../../components/Datalist/Datalist.jsx';
import { createStore } from 'redux';
import rootReducer from '../../store/reducers/index.js';
import { Provider } from 'react-redux';


/*

//Actions
const increment = () => {
	return { type: 'INCREMENT' };
};

const decrement = () => {
	return { type: 'DECREMENT' };
};

// Reducer
const reducerCounter = (state = 0, action) => {
	switch (action.type) {
		case 'INCREMENT':
			return state + 1;
		case 'DECREMENT':
			return state - 1;
		default:
			return state;
	}
};

// Store
let store = createStore(reducerCounter);

// Display
store.subscribe(() => (console.log(store.getState())));

// Dispatch
store.dispatch(increment());
store.dispatch(decrement());

*/

let store = createStore(rootReducer, window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__());

export default function Redux() {

	return (
		<React.Fragment>
			<Provider store={store}>
			<div className="container">
				<div className="row">
					<div className="col-md-6">
						<Counter2 store={store} />
					</div>
					<div className="col-md-6">
						<Datalist store={store} />
					</div>
				</div>
				<div className="row">
					<div className="col-md-12">
						<Main />
					</div>
				</div>
			</div>
			</Provider>
		</React.Fragment>
	);
}