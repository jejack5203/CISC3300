function hasPinecone(str){
	return str.includes("pinecone");
}

const array = [
	"My first name is Jodie.",
	"My last name is Jackson.",
	"I do not have a pet cat named pinecone.",
	"I have a pet turtle named Oswald."
];


const filterPinecone = array.filter(hasPinecone);

console.log(filterPinecone);
