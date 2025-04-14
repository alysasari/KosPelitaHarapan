<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kos Pelita Harapan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>


<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">

        <?php include "./Components/sidebar.php"; ?>

        <!-- Footer User -->
        <div class="absolute bottom-6 left-6 text-sm text-gray-700">
            <p class="font-semibold">Amanda</p>
            <p class="text-gray-500">Perempuan</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class=" p-10 w-full "  data-aos="fade-right" >
        <div class="flex-1 bg-white p-6 rounded-lg shadow-lg ">
            <h2 class="text-xl font-semibold mb-4">Chat Admin</h2>
            <div id="chat-box" class="flex flex-col p-4 h-[400px] overflow-y-auto border rounded-lg bg-gray-50 mb-4"></div>
            <div class="flex">
                <input id="message" type="text" placeholder="Message" class="flex-1 border rounded-l px-4 py-2 focus:outline-none" />
                <button onclick="sendMessage()" class="bg-[#322A7D] text-white px-4 py-2 rounded-r">Kirim</button>
            </div>
        </div>
    </div>
</body>
<script>
    AOS.init();
</script>
<script>
    function fetchMessages() {
        fetch("pages/controller/get_messages.php")
            .then(response => response.json())
            .then(data => {
                const chatBox = document.getElementById("chat-box");
                chatBox.innerHTML = '';
                data.forEach(msg => {
                    const bubble = document.createElement("div");
                    bubble.className = `my-1 p-3 rounded-lg max-w-[70%] ${
                        msg.sender === 'admin' ? 'bg-gray-200 self-start' : 'bg-[#322A7D] text-white self-end ml-auto'
                    }`;
                    bubble.innerText = msg.message;
                    chatBox.appendChild(bubble);
                });
                chatBox.scrollTop = chatBox.scrollHeight;
            });
    }

    function sendMessage() {
        const msg = document.getElementById("message").value;
        if (!msg) return;

        fetch("pages/controller/send_message.php", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `sender=user&message=${encodeURIComponent(msg)}`
        }).then(() => {
            document.getElementById("message").value = '';
            fetchMessages();
        });
    }

    setInterval(fetchMessages, 2000);
    fetchMessages();
</script>
<script>
    AOS.init();
</script>

</html>