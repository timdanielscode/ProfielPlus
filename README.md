### ProfileApp

Wij samen als groep (COAT) moesten voor onze opleiding Software Development een ProfileApp maken.
Als gebruiker kun je een account aanmaken, schoolprestaties toevoegen, werkervaring toevoegen en hobbys.
Deze eerder benoemde onderwerpen kun je als gebruiker beheren.
Ook is er de mogelijkheid om als gebruiker andere profielen te bekijken.
Er zijn twee verschillende soorten rollen binnen de profielapp. 
Zo zijn er 'normale' gebruikers en 'admins'. 
Het idee van de admin gebruiker is dat hij/zij scholen en opleidingen kan toevoegen zodat 'normale' gebruikers deze kunnen koppelen aan zijn of haar profiel. 

### Installatie

- Start de php server in de root van de repository
- Maak een database aan
- Maak een config.ini file en zet deze in de database folder en vul dit bestand aan als volg: 

host=hostname
database=databasename
username=username
password=password

- Importeer create-tables.sql file om de tabellen in de database te inserten
- Importeer insert-admins.sql om een admin aan te maken in de database
- Importeer inser-roles.sql om de verschillende soorten rollen in de database te inserten