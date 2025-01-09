const jsonString = '{"titolo": "Madre Superiora", "nome": "Paola", "età": 55, "città": "Taranto", "sede": "Ciofs"}';

const sorelle = JSON.parse(jsonString);

sorelle.anno_di_consacrazione = 1994;

const updatejsonString = JSON.stringify(sorelle, null, 2);

console.log("Prima della rimozione:", updatejsonString);

delete sorelle.anno_di_consacrazione;

const updatejsonString1 = JSON.stringify(sorelle, null, 2);

console.log("Dopo la rimozione:", updatejsonString1);