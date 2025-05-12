import { createBrowserRouter, RouterProvider } from "react-router-dom";
import TestComponents from "./components/templates/TestComponents";

const router = createBrowserRouter([
    {
        path: "/",
        element: <></>,
    },
    // TODO: remove this route!
    {
        path: "/test",
        element: <TestComponents />,
    }
]);

export default function Router() {
    return <RouterProvider router={router} />
};
