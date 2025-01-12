#Informazioni base
Nome_Pasticceria = "CakeLand"
Nome_Banconista = "Candys"
Collega = "Temperance"
Specialità = "Delicius"
Delicius = ["pan di spagna","bagna analcolica alle madorle","crema chantilly","nutella","granella di nocciole","panna"]
Lista_Prodotti = ["Torta","Mignon","Paste secche","Mousse","Monoporzioni"]
Torta = ["Delicius","Mimosa","Millefoglie","Foresta nera"]

#Inizio Programma
print("Benvenuto da "+Nome_Pasticceria)
print("Mi chiamo "+Nome_Banconista+" e sono pronta ad aiutarti")

print("Come ti chiami?")
Nome_Cliente = input()
print("Ciao "+Nome_Cliente+",benvenuto :)")
print("La nostra specialità è "+Specialità+" vuoi sapere di cosa si tratta?")
Risposta_Cliente = input()
if Risposta_Cliente == "Si":
    print("\nBene, ecco i suoi ingredienti:")
    for Delicius in Delicius:
        print(Delicius)
        continue
    print("\nVuoi procedere con l'ordinazione?")
    Decisione_Cliente = input()
    if Decisione_Cliente == "Si":
        print("Bene, invierò la tua richiesta alla mia collega "+Collega+" che sarà subito da te")
        print("Arrivederci "+Nome_Cliente)
    else:
         while True:
            print("\nBene, cosa vorresti ordinare?")
            for Lista_Prodotto in Lista_Prodotti:
                print(Lista_Prodotto)
            Scelta_Cliente = str(input())
            if Scelta_Cliente in Lista_Prodotti[1, 5]:
                print("Bene, invierò la tua richiesta alla mia collega "+Collega+" che sarà subito da te")
                print("Arrivederci "+Nome_Cliente)
                break
            elif Scelta_Cliente ==Lista_Prodotti[0]:
                print("\nQuale desideri?")
                for Torta in Torta:
                    print(Torta)
                Desiderio_Cliente = input()
            else:
                print("Mi dispiace il prodotto scelto non è disponibile")

else:
    while True:
        print("\nBene, cosa vorresti ordinare?")
        for Lista_Prodotto in Lista_Prodotti:
            print(Lista_Prodotto)
        Scelta_Cliente = input()
        if Scelta_Cliente in Lista_Prodotti:
            print("Bene, invierò la tua richiesta alla mia collega "+Collega+" che sarà subito da te")
            print("Arrivederci "+Nome_Cliente)
            break
        else:
            print("Mi dispiace il prodotto scelto non è disponibile")