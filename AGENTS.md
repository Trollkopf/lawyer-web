# AGENTS.md — Web corporativa para despacho de abogado

## Objetivo del proyecto

Crear una web sobria, elegante y profesional para un abogado o despacho jurídico. La web debe transmitir confianza, rigor, cercanía y solvencia, evitando una estética demasiado agresiva, comercial o recargada.

La referencia visual principal es una web tipo despacho legal moderno, similar en espíritu a Olavo de EnvyTheme: composición limpia, mucho espacio en blanco, bloques editoriales, fotografía cuidada, tipografía elegante y secciones bien diferenciadas. No se debe copiar literalmente la plantilla, solo tomarla como inspiración de tono, ritmo visual y jerarquía.

La web puede resolverse como onepage si el contenido es breve. Debe estar preparada para crecer en el futuro hacia páginas individuales de servicios, abogados, casos de éxito o blog jurídico.

## Concepto visual

La identidad visual debe combinar:

- Blanco como base principal.
- Verdes claros o verdes suaves para fondos, detalles y sensación de serenidad.
- Granate como color de acento institucional, usado con moderación.
- Tonos neutros cálidos para textos secundarios, líneas y fondos alternativos.

La estética debe ser jurídica, sobria y elegante. Nada de colores chillones, sombras exageradas, iconografía infantil o animaciones excesivas.

El diseño debe transmitir:

- Profesionalidad.
- Confianza.
- Experiencia.
- Discreción.
- Cercanía humana.
- Claridad en la comunicación.

## Paleta orientativa

Usar esta paleta como punto de partida:

```css
:root {
  --color-bg: #ffffff;
  --color-bg-soft: #f6faf7;
  --color-green-light: #dceee3;
  --color-green: #8eb99f;
  --color-green-dark: #456b55;

  --color-burgundy: #6d1f2f;
  --color-burgundy-dark: #48131f;

  --color-text: #1f2421;
  --color-text-muted: #68726b;
  --color-border: #e4e8e5;
  --color-gold-soft: #c8a96a;
}
```

El granate debe funcionar como acento para botones, pequeñas líneas, titulares destacados o elementos de autoridad. El verde debe aportar calma, confianza y sofisticación.

## Tipografía

Usar una combinación elegante:

- Titulares: serif sobria, por ejemplo `Playfair Display`, `Cormorant Garamond`, `Libre Baskerville` o similar.
- Texto general: sans serif limpia, por ejemplo `Inter`, `Source Sans 3`, `Lato` o similar.

Los titulares deben tener presencia, pero no parecer una web de lujo exagerado. El texto debe ser muy legible.

## Arquitectura recomendada

La web debe plantearse inicialmente como onepage con navegación por anclas:

- Inicio
- Presentación
- Servicios / Roles
- Abogados
- Casos de éxito
- Opiniones
- Contacto

Si el cliente proporciona más contenido, se puede ampliar a:

- `/servicios`
- `/abogados`
- `/casos-de-exito`
- `/contacto`
- `/blog`

## Secciones de la landing

### 1. Header

Header limpio, fijo o semi-fijo, con fondo blanco o translúcido al hacer scroll.

Debe incluir:

- Logotipo o nombre del despacho.
- Menú de navegación.
- Botón destacado de contacto: “Solicitar consulta”, “Contactar” o “Pedir cita”.

El menú debe ser sobrio, sin demasiados efectos.

### 2. Hero / Carta de presentación

Esta sección debe funcionar como la carta de presentación principal.

Debe incluir:

- Un titular potente y elegante.
- Un subtítulo breve que explique el enfoque del abogado/despacho.
- Una llamada a la acción principal.
- Una llamada secundaria opcional.
- Fotografía profesional del abogado o del despacho, integrada de forma sutil.

La “fotografía subliminal” debe entenderse como una imagen de fondo, retrato lateral, detalle del despacho, manos revisando documentos, biblioteca jurídica o silueta profesional. No debe ser una foto invasiva ni demasiado corporativa.

Ejemplo de tono:

“Defensa jurídica rigurosa, cercana y estratégica.”

“Un despacho orientado a proteger tus intereses con claridad, compromiso y discreción.”

### 3. Presentación / Filosofía

Bloque editorial donde se explique quién es el abogado o despacho.

Debe evitar frases vacías como “somos líderes del sector” si no hay datos reales.

Debe hablar de:

- Trayectoria.
- Forma de trabajar.
- Trato personalizado.
- Claridad en cada fase del proceso.
- Compromiso con el cliente.
- Prudencia y estrategia jurídica.

Puede incluir una firma visual, una cita breve o una frase institucional.

### 4. Roles / Servicios

El cliente ha indicado “Roles (servicios) página inicial”. Esta sección debe convertir esa idea en tarjetas de servicio.

Cada tarjeta puede representar:

- Área de especialización.
- Tipo de cliente objetivo.
- Enfoque del abogado.
- Servicio concreto.
- Casos o problemas habituales.

Estructura recomendada para cada tarjeta:

- Título del servicio.
- Descripción breve.
- Tipo de cliente al que va dirigido.
- Resultado que se busca.
- Enlace o botón “Ver más” si en el futuro hay página individual.

Ejemplos de servicios genéricos:

- Derecho civil.
- Derecho mercantil.
- Derecho inmobiliario.
- Derecho de familia.
- Reclamaciones.
- Asesoramiento preventivo.
- Defensa judicial.
- Negociación y mediación.

No inventar especialidades concretas si el cliente no las ha confirmado. Usar textos editables y preparados para sustituir.

### 5. Abogados / Equipo

Si hay varios abogados, crear una sección por profesional o una parrilla de perfiles.

Cada abogado debe poder mostrar:

- Nombre.
- Cargo o especialidad.
- Fotografía.
- Breve presentación.
- Approach: forma de trabajar.
- Target client: tipo de cliente al que suele ayudar.
- Portfolio o service: áreas principales, experiencia o servicios asociados.
- Enlace a contacto o ficha ampliada.

Si solo hay un abogado, esta sección puede integrarse con la presentación personal.

### 6. Casos de éxito

Sección destinada a demostrar solvencia sin vulnerar confidencialidad.

Importante: no publicar datos sensibles, nombres de clientes ni detalles identificables sin autorización expresa.

Cada caso debe tener:

- Título genérico.
- Problema inicial.
- Intervención del despacho.
- Resultado o valor aportado.
- Área jurídica relacionada.

Ejemplo:

“Resolución favorable en conflicto contractual”
“Se acompañó al cliente durante la fase de negociación y se evitó un procedimiento judicial prolongado.”

El tono debe ser prudente. Evitar prometer resultados.

### 7. Opiniones

Sección de testimonios o reseñas.

Debe incluir:

- Nombre o iniciales del cliente.
- Tipo de asunto, si procede.
- Texto de la opinión.
- Valoración visual discreta.

Si no hay opiniones reales, usar placeholders claramente sustituibles y no presentarlos como reales.

No inventar testimonios finales.

### 8. Contacto

Sección clara y directa.

Debe incluir:

- Formulario de contacto.
- Nombre.
- Email.
- Teléfono.
- Mensaje.
- Checkbox de aceptación legal.
- Información básica de contacto.
- Dirección si existe.
- Teléfono.
- Email.
- Horario.
- Mapa opcional.

La llamada a la acción debe ser sobria:

“Cuéntanos tu caso”
“Solicita una primera consulta”
“Contacta con el despacho”

## Estilo de redacción

El tono debe ser:

- Profesional.
- Claro.
- Humano.
- Prudente.
- Elegante.
- Sin exageraciones comerciales.

Evitar:

- “Ganamos todos los casos”.
- “Los mejores abogados”.
- “Resultados garantizados”.
- “Solución inmediata”.
- “Defensa imbatible”.

Usar mejor:

- “Analizamos cada caso con rigor.”
- “Diseñamos una estrategia jurídica adaptada.”
- “Acompañamos al cliente durante todo el proceso.”
- “Priorizamos la claridad, la discreción y la defensa eficaz de sus intereses.”

## Componentes recomendados

Crear componentes reutilizables:

- `Header`
- `HeroSection`
- `IntroSection`
- `ServicesSection`
- `ServiceCard`
- `LawyerSection`
- `LawyerCard`
- `SuccessCasesSection`
- `CaseCard`
- `TestimonialsSection`
- `TestimonialCard`
- `ContactSection`
- `Footer`
- `SectionTitle`
- `Button`
- `Container`

## Reglas de diseño

- Máximo ancho recomendado: 1120px o 1200px.
- Mucho espacio vertical entre secciones.
- Fondos alternos suaves: blanco / verde muy claro / neutro cálido.
- Bordes finos y elegantes.
- Botones sólidos en granate o verde oscuro.
- Botones secundarios con borde.
- Iconos lineales, discretos y profesionales.
- Animaciones suaves de aparición, nunca llamativas.
- Fotografías con tratamiento sobrio: escala de grises parcial, overlay verde/granate muy sutil o recorte editorial.

## Responsive

La web debe funcionar perfectamente en móvil.

Prioridades mobile:

- Hero claro y legible.
- Menú hamburguesa simple.
- Botón de contacto visible.
- Tarjetas en una columna.
- Formulario cómodo.
- Evitar textos demasiado largos en primera pantalla.

## SEO básico

Preparar la web con:

- Un único H1 en la home.
- H2 claros por sección.
- Metatítulo editable.
- Metadescripción editable.
- URLs limpias si hay páginas internas.
- Marcado semántico HTML5.
- Imágenes con `alt`.
- Schema.org recomendado:
  - `LegalService`
  - `LocalBusiness`
  - `Person`, si hay ficha de abogado
  - `Review`, solo si hay reseñas reales

Ejemplo de title:

“Abogado en [Ciudad] | [Nombre del despacho]”

Ejemplo de meta description:

“Despacho jurídico en [Ciudad]. Asesoramiento y defensa legal con un enfoque claro, riguroso y personalizado.”

## Accesibilidad

Cumplir como mínimo:

- Contraste suficiente entre texto y fondo.
- Botones y enlaces reconocibles.
- Estados `hover`, `focus` y `active`.
- Navegación por teclado.
- Labels visibles o accesibles en formularios.
- No depender solo del color para transmitir información.
- Tamaño mínimo de texto cómodo.

## Formularios y legalidad

El formulario debe contemplar:

- Checkbox de aceptación de política de privacidad.
- Enlace a aviso legal.
- Enlace a política de privacidad.
- Mensaje de consentimiento.
- Protección antispam si procede.

No enviar formularios sin consentimiento explícito.

## Contenido pendiente del cliente

El agente debe dejar preparado contenido editable para:

- Nombre del abogado/despacho.
- Ciudad.
- Especialidades reales.
- Fotografía principal.
- Fotografía de equipo.
- Casos de éxito reales.
- Opiniones reales.
- Datos de contacto.
- Textos legales.

No inventar datos personales, colegiación, número de colegiado, éxitos judiciales ni reseñas.

## Stack recomendado

El proyecto puede implementarse con:

- HTML/CSS/JS simple si es una landing estática.
- Astro si se quiere máxima velocidad y buen SEO.
- Laravel + Blade si se integrará con backend o panel.
- Vue/Nuxt si se quiere una experiencia más dinámica.

Para una web pequeña de abogado, se recomienda:

- Astro + componentes simples, o
- Laravel Blade si el usuario quiere integrarla en un entorno PHP.

Evitar sobrearquitectura innecesaria.

## Entregable inicial recomendado

Crear una landing onepage con estas secciones:

1. Header
2. Hero / carta de presentación
3. Presentación del despacho
4. Servicios
5. Abogado o equipo
6. Casos de éxito
7. Opiniones
8. Contacto
9. Footer legal

## Copy base orientativo

### Hero

Defensa jurídica serena, rigurosa y estratégica.

Acompañamos a particulares y empresas con un asesoramiento claro, honesto y adaptado a cada caso. Nuestro compromiso es proteger tus intereses con discreción, precisión y cercanía.

Botón principal: Solicitar consulta  
Botón secundario: Ver servicios

### Presentación

Cada asunto jurídico exige escucha, análisis y una estrategia bien definida. Nuestro despacho trabaja desde la claridad y la confianza, explicando cada fase del proceso para que el cliente pueda tomar decisiones con seguridad.

### Servicios

Asesoramiento legal adaptado a cada situación.

Desde la prevención de conflictos hasta la defensa judicial, ofrecemos un acompañamiento jurídico orientado a proteger tus derechos y encontrar la vía más adecuada para cada caso.

### Casos de éxito

Experiencia aplicada con prudencia y confidencialidad.

Presentamos algunos ejemplos de intervención profesional, siempre preservando la privacidad de nuestros clientes y evitando cualquier información sensible.

### Contacto

Cuéntanos tu caso.

Estudiaremos tu situación y te indicaremos la mejor forma de proceder con claridad y honestidad.

## Prohibiciones importantes

- No usar lenguaje agresivo de venta.
- No prometer resultados.
- No inventar reseñas.
- No inventar casos reales.
- No usar imágenes genéricas demasiado evidentes de mazos, balanzas o juzgados si hacen que la web parezca barata.
- No saturar la página con animaciones.
- No crear una web oscura o excesivamente dramática.
- No copiar literalmente diseños, textos o estructura exacta de plantillas comerciales.

## Criterio final de calidad

La web debe parecer el sitio de un profesional serio, cercano y solvente. Debe inspirar confianza en menos de cinco segundos, explicar claramente qué hace el despacho y facilitar el contacto sin presión comercial.
