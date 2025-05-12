import Button from "../atoms/Button"
import Container from "../atoms/Container"
import Input from "../atoms/Input"


function FindFumo() {
    return (
        <Container margin className="flex relative items-center flex-col py-10 gap-10">
            <div className="text-center flex flex-col gap-2">
                <h1 className="text-primary">Find your Fumo</h1>
                <span className="text-xl text-gray-500">Write a character</span>
            </div>
            <div className="flex justify-center items-center gap-2">
                <Input size="xl" type="text" placeholder="Ex: Reimu Hakurei" />
                <Button label="Search" variant="primary" size="xl" />
            </div>
        </Container>
    )
}

export default FindFumo
