const STORAGE_KEYS = {
    authenticated: 'litera-static-authenticated',
    history: 'litera-static-history-v1',
    locale: 'litera-static-locale',
};

const demoAccount = {
    email: 'demo@litera.test',
    password: 'LiteraDemo123!',
};

const copy = {
    id: {
        homeEyebrow: 'Baca lebih jernih. Pilih dengan sadar.',
        homeTitle: 'Pahami sebelum percaya.',
        homeDescription: 'Periksa informasi sebelum percaya atau membagikannya. LITERA membantu kamu memahami klaim, sumber, dan maksud konten.',
        analyzeContent: 'Analisis Konten', howItWorks: 'Lihat cara kerjanya',
        humanNote: 'AI membantu kamu memahami. Keputusan akhir tetap di tanganmu.',
        clearContext: 'Konteks yang lebih jelas', forBetterChoices: 'Untuk keputusan yang lebih baik',
        pillarFact: 'Klaim, keyakinan, dan rujukan', pillarIntent: 'Maksud konten dan kesesuaian usia', pillarReason: 'Indikator bahasa dan penjelasan',
        homeNav: 'Beranda', analyzeNav: 'Analisis', historyNav: 'Riwayat', aboutNav: 'Tentang',
        welcomeBack: 'SELAMAT DATANG KEMBALI', loginTitle: 'Masuk ke akunmu', loginDescription: 'Masukkan email dan kata sandi untuk melanjutkan.',
        emailLabel: 'Alamat email', passwordLabel: 'Kata sandi', loginButton: 'Masuk', noAccount: 'Belum punya akun?', learnAbout: 'Kenali LITERA',
        loginError: 'Email atau kata sandi tidak sesuai. Coba lagi.',
        oneLinkCheck: 'ONE-LINK CHECK', analyzeTitle: 'Analisis Konten', analyzeDescription: 'Tempel satu tautan untuk memahami klaim, sumber, dan maksudnya.',
        contentLink: 'Tautan konten', urlHint: 'Tempel tautan yang ingin kamu tinjau.', staticNotice: 'Prototipe statis: analisis contoh ditampilkan di browser ini.',
        analyzeButton: 'Analisis Konten', invalidUrl: 'Masukkan tautan lengkap yang dimulai dengan http:// atau https://.',
        stepInput: 'Tautan', stepReview: 'Tinjauan', stepContext: 'Konteks',
        yourTrail: 'JEJAK LITERASI PERSONAL', historyTitle: 'Jejak Litera', historyDescription: 'Lihat kembali konten yang telah kamu periksa.',
        analysisCount: (count) => `${count} analisis`, newAnalysis: 'Analisis baru', emptyHistoryTitle: 'Belum ada analisis', emptyHistory: 'Tautan yang kamu periksa akan tersimpan di sini.',
        aboutEyebrow: 'TENTANG LITERA', aboutTitle: 'Pahami informasi dengan lebih utuh.', aboutDescription: 'LITERA membantu kamu memahami klaim, sumber, maksud, dan bahasa dalam konten sebelum mempercayai atau membagikannya.',
        content: 'Konten', explanation: 'Penjelasan', yourDecision: 'Keputusanmu', fourParts: 'EMPAT BAGIAN YANG TERHUBUNG',
        featuresTitle: 'Empat bagian yang saling terhubung', featuresDescription: 'Setiap bagian memberi sudut pandang berbeda agar kamu dapat menilai informasi dengan lebih utuh.',
        featureFact: 'Menguraikan klaim, tingkat keyakinan, dan rujukan yang relevan.', featureIntent: 'Membaca maksud konten dan kesesuaiannya berdasarkan usia.',
        featureReason: 'Menjelaskan indikator bahasa yang memengaruhi pembaca.', humanDecision: 'Keputusan manusia', featureHuman: 'Pengguna mempertimbangkan hasil dan menentukan langkahnya sendiri.',
        howLabel: 'ALUR SATU TAUTAN', howTitle: 'Cara kerjanya', howDescription: 'Alur satu tautan menghubungkan pemeriksaan teknis dengan keputusan pengguna.',
        flowOne: 'Mulai dengan satu tautan konten.', flowTwoTitle: 'Ekstraksi & Whisper', flowTwo: 'Teks dan ucapan yang relevan diekstrak untuk ditinjau.',
        flowThree: 'Klaim, sumber, maksud, dan usia ditelaah.', flowFour: 'Hasil dijelaskan agar pengguna dapat mengambil keputusan sendiri.',
        ethicsLabel: 'PENDEKATAN LITERA', ethicsTitle: 'AI membantu. Kamu yang memutuskan.', ethicsDescription: 'Gunakan hasil LITERA sebagai bahan pertimbangan. Keputusan akhir tetap di tangan pengguna.',
        footerDescription: 'Periksa informasi sebelum percaya atau membagikannya.', explore: 'JELAJAHI', footerTagline: 'Pahami sebelum percaya.',
        logoutTitle: 'Keluar dari akun?', logoutDescription: 'Apakah kamu yakin ingin keluar dari akun LITERA?', cancel: 'Batalkan', confirmLogout: 'Ya, Keluar',
        resultLabel: 'Hasil Analisis', confidence: 'Tingkat keyakinan fakta', needsReview: 'PERLU DIPERIKSA',
        confidenceExplanation: 'Dukungan sumber yang ditampilkan belum cukup untuk memastikan klaim ini.',
        intent: 'Maksud konten', ageSuitability: 'Kelayakan usia', notRecommended: 'Tidak disarankan', considerGuidance: 'Perlu pertimbangan', suitable: 'Sesuai',
        ageNote: 'Panduan berdasarkan karakteristik bahasa dan tahap perkembangan.', factsSources: 'Fakta & sumber', mainClaim: 'Klaim utama', status: 'Status',
        factReview: 'Informasi ini masih memerlukan pemeriksaan sumber dan bukti pendukung.', references: 'Rujukan', why: 'Kenapa hasilnya seperti ini?',
        recommendation: 'Rekomendasi', recommendationCopy: 'Periksa sumber dan konteks sebelum mempercayai atau membagikan informasi ini.',
        humanDecisionNote: 'AI membantu kamu memahami. Keputusan akhir tetap di tangan pengguna.', backToAnalyze: 'Analisis tautan lain', openHistory: 'Lihat Jejak Litera',
        sourceSupport: 'Dukungan sumber tersedia', dateLabel: 'Baru saja',
        sourceName: 'LITERA Reference Library', sourceHealth: 'Health Claim Review',
        provocativeTitle: 'Jangan Abaikan Klaim Air Lemon untuk Membersihkan Racun',
        provocativeClaim: 'Air lemon setiap pagi membersihkan racun, dan orang yang meragukannya tidak peduli pada kesehatanmu.',
        provocativeExplanation: 'Klaim kesehatan yang kuat dipadukan dengan bahasa yang mendorong ketidakpercayaan. Reaksi emosional dapat muncul sebelum pembaca memeriksa bukti dan sumbernya.',
        persuasiveTitle: 'Minum Air Lemon Setiap Pagi Dijamin Membersihkan Racun dalam Tubuh',
        persuasiveClaim: 'Minum air lemon setiap pagi dijamin membersihkan seluruh racun dalam tubuh.',
        persuasiveExplanation: 'Diksi yang terdengar pasti digunakan tanpa dukungan sumber yang memadai.',
        commercialTitle: 'Produk Ini Dijamin Membuat Kulit Tampak Lebih Cerah dalam 3 Hari',
        commercialClaim: 'Produk ini dijamin membuat kulit tampak lebih cerah dalam tiga hari.',
        commercialExplanation: 'Bahasa promosi dan klaim manfaat yang sangat pasti digunakan untuk mendorong pembelian.',
        educationalTitle: 'Cara Mengenali Informasi yang Belum Terverifikasi',
        educationalClaim: 'Kenali ciri-ciri informasi yang belum terverifikasi di media sosial.',
        educationalExplanation: 'Konten berfokus pada penjelasan dan langkah mengenali informasi, bukan mendorong pengguna membeli atau mengikuti suatu tindakan.',
        sourceCheck: 'Periksa sumber dan bukti pendukung sebelum mempercayai atau membagikan informasi ini.',
        statusSourceSupport: 'DUKUNGAN SUMBER TERSEDIA',
        contentTypeVideo: 'Video / Media Sosial', contentTypeArticle: 'Artikel / Media Sosial', contentTypePromotion: 'Konten Promosi / Media Sosial',
    },
    en: {
        homeEyebrow: 'Read more clearly. Choose with care.',
        homeTitle: 'Understand before you trust.',
        homeDescription: 'Check information before you trust or share it. LITERA helps you understand a claim, its sources, and its intent.',
        analyzeContent: 'Analyze Content', howItWorks: 'See how it works',
        humanNote: 'AI helps you understand. The final decision is yours.',
        clearContext: 'A clearer context', forBetterChoices: 'For better informed choices',
        pillarFact: 'Claims, confidence, and references', pillarIntent: 'Content intent and age suitability', pillarReason: 'Language signals and explanations',
        homeNav: 'Home', analyzeNav: 'Analyze', historyNav: 'History', aboutNav: 'About',
        welcomeBack: 'WELCOME BACK', loginTitle: 'Log in to your account', loginDescription: 'Enter your email and password to continue.',
        emailLabel: 'Email address', passwordLabel: 'Password', loginButton: 'Log in', noAccount: 'New to LITERA?', learnAbout: 'Get to know LITERA',
        loginError: 'That email and password do not match. Please try again.',
        oneLinkCheck: 'ONE-LINK CHECK', analyzeTitle: 'Analyze Content', analyzeDescription: 'Paste one link to understand its claims, sources, and intent.',
        contentLink: 'Content link', urlHint: 'Paste the link you would like to review.', staticNotice: 'Static prototype: a sample analysis is shown in this browser.',
        analyzeButton: 'Analyze Content', invalidUrl: 'Enter a complete link starting with http:// or https://.',
        stepInput: 'Link', stepReview: 'Review', stepContext: 'Context',
        yourTrail: 'YOUR LITERACY TRAIL', historyTitle: 'Litera History', historyDescription: 'Review the content you have checked.',
        analysisCount: (count) => `${count} analyses`, newAnalysis: 'New analysis', emptyHistoryTitle: 'No analyses yet', emptyHistory: 'Links you review will be saved here.',
        aboutEyebrow: 'ABOUT LITERA', aboutTitle: 'Understand information more fully.', aboutDescription: 'LITERA helps you understand claims, sources, intent, and language before you trust or share content.',
        content: 'Content', explanation: 'Explanation', yourDecision: 'Your decision', fourParts: 'FOUR CONNECTED PARTS',
        featuresTitle: 'Four connected parts', featuresDescription: 'Each part offers a different perspective to help you assess information more fully.',
        featureFact: 'Breaks down claims, confidence, and relevant references.', featureIntent: 'Identifies content intent and age suitability.',
        featureReason: 'Explains language signals that may influence readers.', humanDecision: 'Human decision', featureHuman: 'People consider the result and choose what to do themselves.',
        howLabel: 'ONE-LINK WORKFLOW', howTitle: 'How it works', howDescription: 'A one-link workflow connects technical checks with the user’s decision.',
        flowOne: 'Start with one content link.', flowTwoTitle: 'Extraction & Whisper', flowTwo: 'Relevant text and speech are extracted for review.',
        flowThree: 'Claims, sources, intent, and age suitability are reviewed.', flowFour: 'Results are explained so people can decide for themselves.',
        ethicsLabel: 'OUR APPROACH', ethicsTitle: 'AI helps. You decide.', ethicsDescription: 'Use LITERA’s result as context. The final decision remains with the user.',
        footerDescription: 'Check information before you trust or share it.', explore: 'EXPLORE', footerTagline: 'Understand before you trust.',
        logoutTitle: 'Log out?', logoutDescription: 'Are you sure you want to log out of your LITERA account?', cancel: 'Cancel', confirmLogout: 'Yes, Log out',
        resultLabel: 'Analysis Results', confidence: 'Fact confidence', needsReview: 'NEEDS REVIEW',
        confidenceExplanation: 'The displayed source support is not sufficient to confirm this claim.',
        intent: 'What is the content trying to do?', ageSuitability: 'Age suitability', notRecommended: 'Not recommended', considerGuidance: 'Consider guidance', suitable: 'Suitable',
        ageNote: 'Guidance reflects language and developmental considerations.', factsSources: 'Facts & sources', mainClaim: 'Main claim', status: 'Status',
        factReview: 'This information still needs source and evidence review.', references: 'References', why: 'Why this result?',
        recommendation: 'Recommendation', recommendationCopy: 'Check the source and context before trusting or sharing this information.',
        humanDecisionNote: 'AI helps you understand. The final decision remains with the user.', backToAnalyze: 'Analyze another link', openHistory: 'View Litera History',
        sourceSupport: 'Source support indicated', dateLabel: 'Just now',
        sourceName: 'LITERA Reference Library', sourceHealth: 'Health Claim Review',
        provocativeTitle: 'Do Not Ignore the Lemon Water Detox Claim',
        provocativeClaim: 'Lemon water every morning removes toxins, and anyone who questions it does not care about your health.',
        provocativeExplanation: 'A strong health claim is paired with language that encourages distrust. This can prompt an emotional response before readers check its evidence and sources.',
        persuasiveTitle: 'Drinking Lemon Water Every Morning Is Guaranteed to Cleanse Toxins',
        persuasiveClaim: 'Drinking lemon water every morning is guaranteed to cleanse all toxins from the body.',
        persuasiveExplanation: 'Certain-sounding wording is used without enough supporting sources.',
        commercialTitle: 'This Product Guarantees Brighter-Looking Skin in 3 Days',
        commercialClaim: 'This product is guaranteed to make skin look brighter in three days.',
        commercialExplanation: 'Promotional language and highly certain benefit claims are used to encourage a purchase.',
        educationalTitle: 'How to Recognize Unverified Information',
        educationalClaim: 'Learn to recognize signs of unverified information on social media.',
        educationalExplanation: 'The content focuses on explanations and steps for recognizing information, rather than encouraging users to buy or follow an action.',
        sourceCheck: 'Check the source and supporting evidence before trusting or sharing this information.',
        statusSourceSupport: 'SOURCE SUPPORT INDICATED',
        contentTypeVideo: 'Video / Social Media', contentTypeArticle: 'Article / Social Media', contentTypePromotion: 'Promotional Content / Social Media',
    },
};

const examples = {
    provocative: {
        match: 'provocative-social',
        type: 'provocative',
        titleKey: 'provocativeTitle',
        claimKey: 'provocativeClaim',
        explanationKey: 'provocativeExplanation',
        confidence: 48,
        intent: 'Provokatif',
        contentTypeKey: 'contentTypeVideo',
        indicators: ['Diksi emosional', 'Klaim tanpa sumber', 'Generalisasi berlebihan'],
        ageStatuses: ['notRecommended', 'notRecommended', 'considerGuidance', 'suitable'],
        referenceCode: 'Ref. FC-002',
    },
    persuasive: {
        match: 'persuasive-health',
        type: 'persuasive',
        titleKey: 'persuasiveTitle',
        claimKey: 'persuasiveClaim',
        explanationKey: 'persuasiveExplanation',
        confidence: 72,
        intent: 'Persuasif',
        contentTypeKey: 'contentTypeVideo',
        indicators: ['Diksi emosional', 'Klaim tanpa sumber', 'Generalisasi berlebihan'],
        ageStatuses: ['notRecommended', 'considerGuidance', 'suitable', 'suitable'],
        referenceCode: 'Ref. FC-001',
    },
    commercial: {
        match: 'commercial',
        type: 'commercial',
        titleKey: 'commercialTitle',
        claimKey: 'commercialClaim',
        explanationKey: 'commercialExplanation',
        confidence: 55,
        intent: 'Komersial',
        contentTypeKey: 'contentTypePromotion',
        indicators: ['Bahasa promosi', 'Klaim manfaat sangat pasti', 'Ajakan membeli'],
        ageStatuses: ['considerGuidance', 'considerGuidance', 'suitable', 'suitable'],
        referenceCode: 'Ref. FC-003',
    },
    educational: {
        match: 'educational',
        type: 'educational',
        titleKey: 'educationalTitle',
        claimKey: 'educationalClaim',
        explanationKey: 'educationalExplanation',
        confidence: 91,
        intent: 'Edukatif',
        contentTypeKey: 'contentTypeArticle',
        indicators: ['Bahasa informatif', 'Penjelasan berbasis langkah', 'Tidak ditemukan ajakan berlebihan'],
        ageStatuses: ['suitable', 'suitable', 'suitable', 'suitable'],
        referenceCode: 'Ref. FC-EDU-001',
    },
};

const ageBands = ['<13', '13–15', '16–17', '18+'];
const validViews = new Set(['home', 'login', 'analyze', 'result', 'history', 'about']);
const viewElements = [...document.querySelectorAll('[data-view]')];
const logoutDialog = document.querySelector('#logout-dialog');
const localeFromStorage = readStorage(STORAGE_KEYS.locale);
let locale = localeFromStorage === 'en' ? 'en' : 'id';
let isAuthenticated = readStorage(STORAGE_KEYS.authenticated) === 'true';
let selectedAnalysisId = null;

function readStorage(key) {
    try {
        return window.localStorage.getItem(key);
    } catch {
        return null;
    }
}

function writeStorage(key, value) {
    try {
        window.localStorage.setItem(key, value);
    } catch {
        // The current browser session still works when storage is unavailable.
    }
}

function getHistory() {
    try {
        const history = JSON.parse(window.localStorage.getItem(STORAGE_KEYS.history) || '[]');
        return Array.isArray(history) ? history : [];
    } catch {
        return [];
    }
}

function saveHistory(history) {
    writeStorage(STORAGE_KEYS.history, JSON.stringify(history));
}

function text(key) {
    const entry = copy[locale][key];
    return typeof entry === 'function' ? entry : entry ?? copy.id[key] ?? key;
}

function localizeStaticCopy() {
    document.documentElement.lang = locale;
    document.querySelectorAll('[data-copy]').forEach((element) => {
        const translated = text(element.dataset.copy);
        if (typeof translated === 'string') {
            element.textContent = translated;
        }
    });

    document.querySelectorAll('[data-language]').forEach((button) => {
        button.setAttribute('aria-pressed', String(button.dataset.language === locale));
    });

    document.querySelectorAll('[data-logout-open]').forEach((button) => {
        button.textContent = locale === 'id' ? 'Keluar' : 'Log out';
    });

    document.querySelectorAll('[data-login-link]').forEach((link) => {
        link.textContent = locale === 'id' ? 'Masuk' : 'Log in';
    });

    const passwordToggle = document.querySelector('[data-password-toggle]');
    if (passwordToggle) {
        const isVisible = document.querySelector('#password').type === 'text';
        passwordToggle.setAttribute('aria-label', locale === 'id'
            ? (isVisible ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi')
            : (isVisible ? 'Hide password' : 'Show password'));
    }

    document.title = locale === 'id' ? 'LITERA — Pahami sebelum percaya' : 'LITERA — Understand before you trust';
}

function navigate(view) {
    if (!validViews.has(view)) {
        view = 'home';
    }

    if (['analyze', 'result', 'history'].includes(view) && !isAuthenticated) {
        view = 'login';
    }

    if (window.location.hash !== `#${view}`) {
        window.location.hash = view;
    } else {
        renderView(view);
    }
}

function currentView() {
    const requestedView = window.location.hash.slice(1).split('?')[0];
    return validViews.has(requestedView) ? requestedView : 'home';
}

function renderView(view = currentView()) {
    if (['analyze', 'result', 'history'].includes(view) && !isAuthenticated) {
        if (window.location.hash !== '#login') {
            window.location.hash = 'login';
        }
        view = 'login';
    }

    viewElements.forEach((element) => {
        element.hidden = element.dataset.view !== view;
    });

    document.querySelectorAll('[data-nav]').forEach((link) => {
        const isCurrent = link.dataset.nav === view || (view === 'result' && link.dataset.nav === 'analyze');
        if (isCurrent) {
            link.setAttribute('aria-current', 'page');
        } else {
            link.removeAttribute('aria-current');
        }
    });

    document.querySelectorAll('[data-login-link]').forEach((link) => {
        link.hidden = isAuthenticated;
    });
    document.querySelectorAll('[data-logout-open]').forEach((button) => {
        button.hidden = !isAuthenticated;
    });

    if (view === 'history') {
        renderHistory();
    } else if (view === 'result') {
        renderResult();
    }

    window.scrollTo({ top: 0, behavior: 'instant' });
}

function resolveScenario(url) {
    const normalizedUrl = url.toLowerCase();
    return Object.values(examples).find((example) => normalizedUrl.includes(example.match)) || examples.provocative;
}

function createAnalysis(url) {
    const scenario = resolveScenario(url);
    return {
        id: `${Date.now()}-${Math.random().toString(36).slice(2, 8)}`,
        url,
        type: scenario.type,
        titleKey: scenario.titleKey,
        claimKey: scenario.claimKey,
        explanationKey: scenario.explanationKey,
        confidence: scenario.confidence,
        intent: scenario.intent,
        contentTypeKey: scenario.contentTypeKey,
        indicators: scenario.indicators,
        ageStatuses: scenario.ageStatuses,
        referenceCode: scenario.referenceCode,
        createdAt: new Date().toISOString(),
    };
}

function statusText(statusKey) {
    return text(statusKey);
}

function renderResult() {
    const history = getHistory();
    const analysis = history.find((item) => item.id === selectedAnalysisId) || history[0];
    const host = document.querySelector('#result-content');

    if (!analysis) {
        host.innerHTML = `<div class="empty-state"><strong>${escapeHtml(text('emptyHistoryTitle'))}</strong><p>${escapeHtml(text('emptyHistory'))}</p></div>`;
        return;
    }

    const createdDate = new Date(analysis.createdAt);
    const displayDate = Number.isNaN(createdDate.getTime()) ? text('dateLabel') : createdDate.toLocaleDateString(locale === 'id' ? 'id-ID' : 'en-US', { day: 'numeric', month: 'short', year: 'numeric' });
    const claim = text(analysis.claimKey);
    const explanation = text(analysis.explanationKey);
    const title = text(analysis.titleKey);
    const indicators = analysis.indicators.map((indicator) => `<li>${escapeHtml(translateIndicator(indicator))}</li>`).join('');
    const ages = ageBands.map((band, index) => `<li><span>${escapeHtml(band)}</span><strong>${escapeHtml(statusText(analysis.ageStatuses[index]))}</strong></li>`).join('');
    const intent = translateIntent(analysis.intent);
    const type = text(analysis.contentTypeKey);
    const urlLabel = escapeHtml(analysis.url);

    host.innerHTML = `
        <header class="result-header">
            <p class="result-kicker">${escapeHtml(text('resultLabel'))}</p>
            <h1 id="result-page-title">${escapeHtml(title)}</h1>
            <p class="result-meta"><span>${escapeHtml(displayDate)}</span><span aria-hidden="true">·</span><span>${escapeHtml(type)}</span><span aria-hidden="true">·</span><span>${urlLabel}</span></p>
        </header>
        <div class="result-stack">
            <section class="result-card confidence-card" aria-labelledby="confidence-title">
                <div><h2 id="confidence-title">${escapeHtml(text('confidence'))}</h2><div class="confidence-number">${Number(analysis.confidence)}%</div></div>
                <div><span class="result-status">${escapeHtml(text('needsReview'))}</span><p class="confidence-copy">${escapeHtml(text('confidenceExplanation'))}</p></div>
            </section>
            <div class="result-pair">
                <section class="result-card" aria-labelledby="intent-title"><h2 id="intent-title">${escapeHtml(text('intent'))}</h2><p class="intent-label">${escapeHtml(intent)}</p><p>${escapeHtml(explanation)}</p><span class="tech-label">IntentScope</span></section>
                <section class="result-card" aria-labelledby="age-title"><h2 id="age-title">${escapeHtml(text('ageSuitability'))}</h2><ul class="age-list">${ages}</ul><p class="small-note">${escapeHtml(text('ageNote'))}</p><span class="tech-label">IntentScope</span></section>
            </div>
            <section class="result-card" aria-labelledby="facts-title"><h2 id="facts-title">${escapeHtml(text('factsSources'))}</h2><div class="claim-box"><p class="field-label">${escapeHtml(text('mainClaim'))}</p><p>${escapeHtml(claim)}</p></div><div class="source-box"><p class="field-label">${escapeHtml(text('status'))}</p><p>${escapeHtml(text('factReview'))}</p></div><div class="source-box"><p class="field-label">${escapeHtml(text('references'))}</p><p class="source-entry"><strong>${escapeHtml(text('sourceName'))}</strong><span>${escapeHtml(text('sourceHealth'))}</span><span>${escapeHtml(analysis.referenceCode)}</span></p></div><span class="tech-label">FactLens</span></section>
            <section class="result-card" aria-labelledby="reason-title"><h2 id="reason-title">${escapeHtml(text('why'))}</h2><ul class="indicators">${indicators}</ul><p>${escapeHtml(explanation)}</p><span class="tech-label">LiteraReason</span></section>
            <section class="result-card recommendation-card" aria-labelledby="recommendation-title"><h2 id="recommendation-title">${escapeHtml(text('recommendation'))}</h2><p>${escapeHtml(analysis.type === 'provocative' ? text('recommendationCopy') : text('sourceCheck'))}</p></section>
            <p class="human-note">${escapeHtml(text('humanDecisionNote'))}</p>
        </div>
        <div class="result-actions"><a class="button button-light" href="#analyze" data-route="analyze">${escapeHtml(text('backToAnalyze'))}</a><a class="quiet-link" href="#history" data-route="history">${escapeHtml(text('openHistory'))}<span aria-hidden="true">→</span></a></div>
    `;
}

function renderHistory() {
    const history = getHistory().sort((first, second) => new Date(second.createdAt) - new Date(first.createdAt));
    const host = document.querySelector('#history-list');
    const count = document.querySelector('#history-count');
    count.textContent = text('analysisCount')(history.length);

    if (!history.length) {
        host.innerHTML = `<div class="empty-state"><strong>${escapeHtml(text('emptyHistoryTitle'))}</strong><p>${escapeHtml(text('emptyHistory'))}</p></div>`;
        return;
    }

    host.replaceChildren(...history.map((analysis) => {
        const row = document.createElement('a');
        row.className = 'history-row';
        row.href = '#result';
        row.dataset.openAnalysis = analysis.id;

        const title = document.createElement('div');
        const heading = document.createElement('h2');
        heading.textContent = text(analysis.titleKey);
        const meta = document.createElement('p');
        const date = new Date(analysis.createdAt);
        const dateText = Number.isNaN(date.getTime()) ? text('dateLabel') : date.toLocaleDateString(locale === 'id' ? 'id-ID' : 'en-US', { day: 'numeric', month: 'short', year: 'numeric' });
        meta.textContent = `${dateText} · ${text(analysis.contentTypeKey)}`;
        title.append(heading, meta);

        const tags = document.createElement('div');
        tags.className = 'history-tags';
        const status = document.createElement('span');
        status.className = 'tag';
        status.textContent = text('needsReview');
        const intent = document.createElement('span');
        intent.className = 'tag tag-neutral';
        intent.textContent = translateIntent(analysis.intent);
        tags.append(status, intent);

        const arrow = document.createElement('span');
        arrow.className = 'history-arrow';
        arrow.setAttribute('aria-hidden', 'true');
        arrow.textContent = '›';
        row.append(title, tags, arrow);
        return row;
    }));
}

function translateIntent(intent) {
    if (locale === 'id') {
        return intent;
    }
    return ({ Edukatif: 'Educational', Persuasif: 'Persuasive', Provokatif: 'Provocative', Komersial: 'Commercial' })[intent] || intent;
}

function translateIndicator(indicator) {
    if (locale === 'id') {
        return indicator;
    }
    return ({
        'Diksi emosional': 'Emotional wording',
        'Klaim tanpa sumber': 'Claim without a source',
        'Generalisasi berlebihan': 'Overgeneralization',
        'Bahasa informatif': 'Informative language',
        'Penjelasan berbasis langkah': 'Step-by-step explanation',
        'Tidak ditemukan ajakan berlebihan': 'No excessive call to action',
        'Bahasa promosi': 'Promotional language',
        'Klaim manfaat sangat pasti': 'Highly certain benefit claim',
        'Ajakan membeli': 'Encourages a purchase',
    })[indicator] || indicator;
}

function escapeHtml(value) {
    return String(value).replace(/[&<>"']/g, (character) => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;',
    })[character]);
}

document.addEventListener('click', (event) => {
    const analysisLink = event.target.closest('[data-open-analysis]');
    if (analysisLink) {
        selectedAnalysisId = analysisLink.dataset.openAnalysis;
        navigate('result');
        return;
    }

    const routeLink = event.target.closest('[data-route]');
    if (routeLink) {
        event.preventDefault();
        navigate(routeLink.dataset.route);
    }
});

window.addEventListener('hashchange', () => renderView());

document.querySelectorAll('[data-language]').forEach((button) => {
    button.addEventListener('click', () => {
        locale = button.dataset.language;
        writeStorage(STORAGE_KEYS.locale, locale);
        localizeStaticCopy();
        renderView();
    });
});

document.querySelector('#login-form').addEventListener('submit', (event) => {
    event.preventDefault();
    const form = event.currentTarget;
    const formData = new FormData(form);
    const email = String(formData.get('email') || '').trim().toLowerCase();
    const password = String(formData.get('password') || '');
    const error = document.querySelector('#login-error');

    if (email !== demoAccount.email || password !== demoAccount.password) {
        error.textContent = text('loginError');
        error.hidden = false;
        return;
    }

    error.hidden = true;
    form.reset();
    document.querySelector('#password').type = 'password';
    isAuthenticated = true;
    writeStorage(STORAGE_KEYS.authenticated, 'true');
    navigate('analyze');
});

document.querySelector('[data-password-toggle]').addEventListener('click', (event) => {
    const password = document.querySelector('#password');
    const toggle = event.currentTarget;
    const shouldShow = password.type === 'password';
    password.type = shouldShow ? 'text' : 'password';
    toggle.setAttribute('aria-pressed', String(shouldShow));
    toggle.setAttribute('aria-label', locale === 'id'
        ? (shouldShow ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi')
        : (shouldShow ? 'Hide password' : 'Show password'));
});

document.querySelector('#analysis-form').addEventListener('submit', (event) => {
    event.preventDefault();
    const form = event.currentTarget;
    const input = form.elements.url;
    const error = document.querySelector('#analysis-error');
    let submittedUrl;

    try {
        submittedUrl = new URL(input.value.trim());
        if (!['http:', 'https:'].includes(submittedUrl.protocol)) {
            throw new TypeError('Unsupported URL protocol');
        }
    } catch {
        error.textContent = text('invalidUrl');
        error.hidden = false;
        input.focus();
        return;
    }

    error.hidden = true;
    const analysis = createAnalysis(submittedUrl.href);
    const history = getHistory();
    history.unshift(analysis);
    saveHistory(history.slice(0, 50));
    selectedAnalysisId = analysis.id;
    navigate('result');
});

document.querySelectorAll('[data-logout-open]').forEach((button) => {
    button.addEventListener('click', () => logoutDialog.showModal());
});
document.querySelector('[data-logout-cancel]').addEventListener('click', () => logoutDialog.close());
document.querySelector('[data-logout-confirm]').addEventListener('click', () => {
    isAuthenticated = false;
    writeStorage(STORAGE_KEYS.authenticated, 'false');
    selectedAnalysisId = null;
    logoutDialog.close();
    navigate('home');
});
logoutDialog.addEventListener('click', (event) => {
    if (event.target === logoutDialog) {
        logoutDialog.close();
    }
});

document.querySelector('#current-year').textContent = String(new Date().getFullYear());
localizeStaticCopy();
renderView();
