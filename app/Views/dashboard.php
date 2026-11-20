
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UltraAI Support | Ultracoding</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            background: #0b1020;
            color: #e8edf8;
            font-family: Arial, sans-serif;
        }
        .layout { display: flex; min-height: 100vh; }
        .sidebar {
            width: 240px;
            background: #10182b;
            padding: 28px 20px;
            border-right: 1px solid #26324a;
        }
        .brand { color: #e8c878; font-size: 25px; font-weight: bold; }
        .brand small {
            display: block; color: #8290aa; font-size: 10px;
            letter-spacing: 2px; margin-top: 6px;
        }
        .menu-title { color: #71809b; font-size: 11px; margin: 40px 0 15px; }
        .menu a {
            display: block; padding: 13px; margin-bottom: 7px;
            color: #aab5c9; text-decoration: none; border-radius: 8px;
        }
        .menu a.active { background: #26334c; color: #e8c878; }
        .main { flex: 1; padding: 35px; min-width: 0; }
        .topbar {
            display: flex; justify-content: space-between;
            align-items: center; gap: 15px; margin-bottom: 35px;
        }
        h1 { margin: 0; font-size: 27px; }
        .subtitle { color: #8794ac; margin-top: 8px; font-size: 14px; }
        .gold { color: #e8c878; }
        .status {
            background: #123629; border: 1px solid #285d4b;
            color: #7ce0ae; padding: 9px 14px;
            border-radius: 30px; font-size: 12px;
        }
        .demo-label {
            display: inline-block; margin-top: 15px;
            padding: 7px 11px; border-radius: 6px;
            background: #493d26; color: #f1d58d;
            border: 1px solid #75613a; font-size: 11px;
        }
        .stats {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 18px; margin-bottom: 25px;
        }
        .card {
            background: #131e33; border: 1px solid #293751;
            border-radius: 14px; padding: 22px;
        }
        .stat-label { color: #91a0b9; font-size: 13px; }
        .stat-value { font-size: 28px; font-weight: bold; margin-top: 13px; }
        .workspace {
            display: grid; grid-template-columns: 1fr 300px; gap: 20px;
        }
        .section-title { font-size: 17px; font-weight: bold; }
        .section-desc { color: #8794ac; font-size: 13px; margin-top: 7px; }
        .chat-preview {
            margin-top: 25px; background: #0e1729;
            border: 1px solid #263751; border-radius: 12px;
            padding: 20px; min-height: 300px;
        }
        .chat-messages {
            display: flex; flex-direction: column; gap: 15px;
            max-height: 350px; overflow-y: auto; padding-bottom: 18px;
        }
        .bubble {
            background: #202e46; padding: 15px;
            border-radius: 12px; max-width: 85%;
            font-size: 13px; line-height: 1.7;
            white-space: pre-wrap; overflow-wrap: anywhere;
        }
        .bubble.user { background: #493d26; margin-left: auto; }
        .bubble.error { background: #482b36; color: #ffb5bd; }
        .chat-form { display: flex; gap: 10px; margin-top: 15px; }
        .chat-form input {
            flex: 1; min-width: 0; padding: 13px;
            border: 1px solid #34445f; border-radius: 8px;
            background: #131e33; color: #fff; outline: none;
        }
        .chat-form input:focus { border-color: #e8c878; }
        .chat-form button {
            padding: 0 22px; border: 0; border-radius: 8px;
            background: #e8c878; color: #151b29;
            font-weight: bold; cursor: pointer;
        }
        .chat-form button:disabled { opacity: .5; cursor: not-allowed; }
        .chat-note { color: #8290aa; font-size: 11px; margin-top: 12px; }
        .feature {
            padding: 15px 0; border-bottom: 1px solid #293751;
            color: #aebbd0; font-size: 13px;
        }
        .feature span { color: #e8c878; margin-right: 8px; }
        .footer { color: #65738d; font-size: 12px; margin-top: 35px; }
        @media(max-width: 850px) {
            .workspace { grid-template-columns: 1fr; }
        }
        @media(max-width: 600px) {
            .sidebar { display: none; }
            .main { padding: 20px 15px; }
            .stats { grid-template-columns: 1fr; }
            h1 { font-size: 22px; }
            .topbar { align-items: flex-start; }
            .chat-form button { padding: 0 14px; }
        }
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand">UltraAI
            <small>BY ULTRACODING</small>
        </div>
        <div class="menu-title">WORKSPACE</div>
        <nav class="menu">
            <a href="/" class="active">▦ Dashboard</a>
            <a href="#playground">✦ AI Playground</a>
            <a href="#features">▤ Knowledge Base</a>
            <a href="#playground">☷ Chat History</a>
            <a href="#features">⚙ Settings</a>
        </nav>
        <div class="menu-title">SYSTEM</div>
        <nav class="menu">
            <a href="#features">◈ API Integration</a>
            <a href="#features">♙ User Management</a>
        </nav>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <h1>Dashboard <span class="gold">UltraAI</span></h1>
                <div class="subtitle">AI Customer Support Management Platform</div>
                <div class="demo-label">DEMO MODE · SIMULATED RESPONSES</div>
            </div>
            <div class="status">● System Online</div>
        </header>

        <section class="stats">
            <div class="card">
                <div class="stat-label">Total Conversations</div>
                <div class="stat-value" id="conversationCount">0</div>
            </div>
            <div class="card">
                <div class="stat-label">Demo Responses</div>
                <div class="stat-value" id="responseCount">0</div>
            </div>
            <div class="card">
                <div class="stat-label">Knowledge Documents</div>
                <div class="stat-value">0</div>
            </div>
        </section>

        <section class="workspace">
            <div class="card" id="playground">
                <div class="section-title">AI Playground</div>
                <div class="section-desc">
                    Try the UltraAI customer support chatbot.
                </div>

                <div class="chat-preview">
                    <div class="chat-messages" id="chatMessages" aria-live="polite">
                        <div class="bubble">
                            <strong class="gold">UltraAI Assistant</strong><br>
                            Halo! Saya asisten UltraAI. Silakan ketik pertanyaan
                            untuk mencoba demonstrasi customer support.
                        </div>
                    </div>

                    <form class="chat-form" id="chatForm">
                        <input
                            type="text"
                            id="messageInput"
                            placeholder="Ketik pertanyaan Anda..."
                            maxlength="4000"
                            autocomplete="off"
                            required
                        >
                        <button type="submit" id="sendButton">Send</button>
                    </form>
                    <div class="chat-note">
                        Demo Mode: jawaban simulasi, bukan respons AI live.
                    </div>
                </div>
            </div>

            <div class="card" id="features">
                <div class="section-title">Platform Features</div>
                <div class="section-desc">Core modules of UltraAI Support</div>
                <div style="margin-top:20px">
                    <div class="feature"><span>✦</span> AI Conversations</div>
                    <div class="feature"><span>✦</span> Knowledge Base</div>
                    <div class="feature"><span>✦</span> Chat History</div>
                    <div class="feature"><span>✦</span> REST API</div>
                    <div class="feature"><span>✦</span> Admin Dashboard</div>
                </div>
            </div>
        </section>

        <div class="footer">
            © <?= date('Y') ?> Ultracoding · UltraAI Support
        </div>
    </main>
</div>

<script>
const chatForm = document.getElementById('chatForm');
const messageInput = document.getElementById('messageInput');
const sendButton = document.getElementById('sendButton');
const chatMessages = document.getElementById('chatMessages');

let conversationCount = 0;
let responseCount = 0;

function addMessage(message, type) {
    const bubble = document.createElement('div');
    bubble.className = 'bubble ' + type;
    bubble.textContent = message;
    chatMessages.appendChild(bubble);
    chatMessages.scrollTop = chatMessages.scrollHeight;
    return bubble;
}

chatForm.addEventListener('submit', async function(event) {
    event.preventDefault();

    const message = messageInput.value.trim();
    if (!message || sendButton.disabled) return;

    addMessage(message, 'user');
    messageInput.value = '';
    sendButton.disabled = true;
    sendButton.textContent = '...';

    const loading = addMessage('UltraAI sedang memproses pesan...', '');

    try {
        const response = await fetch('/api/chat', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ message: message })
        });

        const data = await response.json();
        loading.remove();

        if (!response.ok || !data.success) {
            throw new Error(data.message || 'Terjadi kesalahan.');
        }

        addMessage(data.reply, '');
        responseCount++;
        conversationCount++;

        document.getElementById('responseCount').textContent = responseCount;
        document.getElementById('conversationCount').textContent = conversationCount;

    } catch (error) {
        loading.remove();
        addMessage(error.message || 'Gagal menghubungi server.', 'error');
    } finally {
        sendButton.disabled = false;
        sendButton.textContent = 'Send';
        messageInput.focus();
    }
});
</script>
</body>
</html>
