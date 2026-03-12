<script>

let afspraken = []

async function load(){

    const res = await fetch("http://localhost:8000/api/afspraken")
    afspraken = await res.json()

}

async function verwijderen(id){

await fetch(`http://localhost:8000/api/afspraken/${id}`,{
method:"DELETE"
})

load()

}

load()

</script>

{#each afspraken as afspraak}

<div class="border p-4 mb-2">

<h2>{afspraak.naam}</h2>

<p>{afspraak.datum} {afspraak.tijd}</p>

<p>{afspraak.dienst}</p>

<button on:click={()=>verwijderen(afspraak.id)}>
Verwijderen
</button>

</div>

{/each}