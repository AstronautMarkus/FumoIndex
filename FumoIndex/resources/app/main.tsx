import { createRoot } from "react-dom/client";
import React from "react";
import App from "./App";
import '../assets/css/app.css';
import './i18n';


createRoot(document.getElementById("root")!).render(
    <React.StrictMode>
        <React.Suspense fallback="Loading...">
            <App />
        </React.Suspense>
    </React.StrictMode>
);