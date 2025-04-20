import React from 'react';
import ReactDOM from 'react-dom/client';
//import App from './apps/App.jsx';

const container = document.getElementById('root');
const root = ReactDOM.createRoot(container);

const renderApp =()=>{
    const App = require('./apps/App.jsx').default;
    root.render(<App />);
}

renderApp();

if (import.meta.hot) {
    import.meta.hot.accept('./apps/App.jsx', () => {
        renderApp();
    });
}



