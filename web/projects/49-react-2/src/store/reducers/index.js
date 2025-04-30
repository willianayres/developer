import { combineReducers } from 'redux';
import Number from './Num_reducer.js';
import Data from './Data_reducer.js';

const rootReducer = combineReducers({
	Number,
	Data
});

export default rootReducer;