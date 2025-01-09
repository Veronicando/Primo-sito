const jsonString = '{"titolo": "Madre Superiora", "nome": "Paola", "età": 55, "città": "Taranto", "sede": "Ciofs"}';

const sorelle = JSON.parse(jsonString);

console.log(sorelle.titolo);
console.log(sorelle.nome);
console.log(sorelle.età);
console.log(sorelle.città);
console.log(sorelle.sede);