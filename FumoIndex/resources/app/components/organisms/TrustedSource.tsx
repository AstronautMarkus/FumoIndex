import Button from "../atoms/Button"
import Container from "../atoms/Container"
import Decoration from "../atoms/Decoration"

function TrustedSource() {
    return (

        <Container margin className="py-20 flex flex-col gap-10 justify-between w-200 items-center">
            <div className="flex justify-center mx-10  gap-6">
                <div className="grow hidden md:block">
                    <Decoration></Decoration>
                </div>
                <div className="text-gray-500 text-xl">
                    <h1 className="text-primary">Your trusted source for fumos</h1>
                    <p className="my-5">
                        We are a page create to guide you and compile all the FumoFumo plush toys ever created.
                    </p>
                    <p className="my-5">
                        Originally, the FumoFumo plush toys belonged exclusively to Touhou Project series,
                        but times have changed, and now we have other collaborations from differente franchises.
                    </p>
                    <p className="my-5">
                        On this page you’ll primarly find information and images about Fumos,
                        but we’ll also publish other articles from time to time
                    </p>
                </div>
            </div>
            <Button label="Fumo Origins" />
        </Container>
    )
}

export default TrustedSource
