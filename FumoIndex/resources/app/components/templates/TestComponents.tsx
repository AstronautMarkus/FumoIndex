import Container from "../atoms/Container";
import ImageViewer from "../molecules/ImageViewer";
import Banner from "../organisms/Banner";
import FindFumo from "../organisms/FindFumo";
import Navbar from "../organisms/Navbar";
import TrustedSource from "../organisms/TrustedSource";
import FumoMarisa from "../../../assets/png/fumo2.png";
import ChooseFumo from "../organisms/ChooseFumo";
import Footer from "../organisms/Footer";
import { Link } from "react-router-dom";

// TODO: remove. this is just for testing

function TestComponents() {
    return (
        <>
            <Navbar></Navbar>
            <Banner></Banner>
            <FindFumo></FindFumo>
            <TrustedSource></TrustedSource>
            <ChooseFumo />
            <Footer></Footer>
        </>
    )
}

export default TestComponents;
