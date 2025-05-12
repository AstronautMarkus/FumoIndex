import Button from "../atoms/Button";
import Container from "../atoms/Container";
import Reimu from "../../../assets/png/fumo_reimu.png";
import Marisa from "../../../assets/png/fumo_marisa.png";

function Banner() {
    return (
        <Container className="flex relative justify-center items-center flex-col gap-10 h-[800px]">
            <div className="absolute hidden w-50 h-50 rotate-[6deg] r-chibi-breakpoints">
                <img src={Reimu} alt="Banner" draggable={false} />
            </div>
            <div className=" flex flex-col gap-2 text-center select-none">
                <div className="text-7xl text-nowrap md:text-8xl font-bold text-primary">Fumo Index</div>
                <div className="text-2xl text-primary">The ultimate guide to all things Fumo!</div>
            </div>
            <div className="flex w-full md:w-auto justify-between flex-col md:flex-row gap-10">
                <Button textAlign="center" textWrap="nowrap" label="What's a Fumo?" variant="outline" size="2xl" />
                <Button textAlign="center" textWrap="nowrap" label="Explore Fumos List" variant="primary" size="2xl" />
                <Button textAlign="center" textWrap="nowrap" label="How to get Fumos" variant="outline" size="2xl" />
            </div>
            <div className="absolute hidden w-50 h-50 scale-x-[-100%] rotate-[-6deg] l-chibi-breakpoints">
                <img src={Marisa} alt="Banner" draggable={false} />
            </div>
        </Container>
    )
}

export default Banner;
