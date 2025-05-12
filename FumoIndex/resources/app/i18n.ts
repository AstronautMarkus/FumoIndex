import i18next from "i18next";
import { initReactI18next } from "react-i18next";
import LanguageDetector from "i18next-browser-languagedetector";
import HttpBackend from "i18next-http-backend";

// Translation files are located in: `/public/lang/`
i18next
    .use(initReactI18next)
    .use(LanguageDetector)
    .use(HttpBackend)
    .init({
        backend: {
            loadPath: "/lang/{{lng}}/{{ns}}.json",
        },
        fallbackLng: "en",
        debug: true,
        supportedLngs: ["en", "es"],
    })
