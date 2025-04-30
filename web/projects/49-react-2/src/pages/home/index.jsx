import React from 'react';
import { useNavigate } from 'react-router-dom';
import Counters from '../../components/Counters/Counters.jsx';
import Form from '../../components/Form/Form.jsx';

export default function Home() {
	const navigate = useNavigate();

	return (
		<React.Fragment>
			<h1>Home</h1>
			<button onClick={() => navigate('/logado')}>Ir para Logado!</button>
			<Counters />
			<Form />
		</React.Fragment>
	);
}