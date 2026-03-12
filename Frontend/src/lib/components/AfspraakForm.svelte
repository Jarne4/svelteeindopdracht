<script>
    let naam = ""
    let email = ""
    let datum = ""
    let tijd = ""
    let dienst = ""
    let opmerking = ""

    async function submit() {

        await fetch("http://localhost:8000/api/afspraken",{
            method:"POST",
            headers:{
                "Content-Type":"application/json"
            },
            body: JSON.stringify({
                naam,
                email,
                datum,
                tijd,
                dienst,
                opmerking
            })
        })

        alert("Afspraak gemaakt!")
    }
</script>

<form on:submit|preventDefault={submit} class="space-y-4">

<input bind:value={naam} placeholder="Naam" class="input"/>

<input bind:value={email} type="email" placeholder="Email"/>

<input bind:value={datum} type="date"/>

<input bind:value={tijd} type="time"/>

<select bind:value={dienst}>
<option>Kapper</option>
<option>Kleuren</option>
<option>Knippen</option>
</select>

<textarea bind:value={opmerking} placeholder="Opmerking"></textarea>

<button class="bg-blue-500 text-white px-4 py-2">
Afspraak maken
</button>

</form>