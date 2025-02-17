const cats = [
    {
        name: 'Charlie',
        adoptionStatus: 'available'
    },
    {
        name: 'Lily',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Coco',
        adoptionStatus: 'available'
    },
    {
        name: 'Oreo',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Luna',
        adoptionStatus: 'available'
    },
    {
        name: 'Milo',
        adoptionStatus: 'available'
    },
    {
        name: 'Lola',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Leo',
        adoptionStatus: 'available'
    },
    {
        name: 'Willow',
        adoptionStatus: 'available'
    },
    {
        name: 'Bella',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Max',
        adoptionStatus: 'available'
    },
    {
        name: 'Cleo',
        adoptionStatus: 'available'
    },
    {
        name: 'Lucy',
        adoptionStatus: 'not-available'
    },
    {
        name: 'Daisy',
        adoptionStatus: 'available'
    },
];

const cat = {name:"Pinecone", age:13, type:'Munchkin', cuteness: 9001};

//Question 6a

function isAvailable(cat) {
    return cat.adoptionStatus === "available";
}
const results = cats.filter(isAvailable).map(cat => cat.name);
console.log(results);

//Question 6b

const newSentence = `I adopted 9 cats their names are ${results.join(", ")}.`;
console.log(newSentence);

//Question 7

const ternaryValue = Math.random() * 10;
console.log(ternaryValue);

if(ternaryValue > 5) {
	console.log("Greater than five!");

} else {
	console.log("Less than five!");
}

//Question 8

for (const property in cat) {
	console.log(cat[property]);
}

//Question 9

if(1 == '1') {
	console.log('true');
} else {
	console.log('false');
}


if (1 === '1') {
	console.log('true');
} else {
	console.log('false');
}

//Question 10

results.forEach(function(i) {
	console.log(i + ' is cute!');
});

