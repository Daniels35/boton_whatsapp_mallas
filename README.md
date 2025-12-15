# 🟢 WhatsApp Buttons para WooCommerce

**Integración directa de contacto por WhatsApp en fichas de producto.**

Este plugin ligero añade automáticamente un botón de "Contactar por WhatsApp" en la página de detalles de tus productos en WooCommerce. Al hacer clic, abre una conversación con un mensaje pre-llenado que incluye el **nombre del producto** y su **enlace**, facilitando al vendedor identificar exactamente qué le interesa al cliente.

## 📋 Características Principales

### 🛒 Integración con WooCommerce
* **Despliegue Automático:** Se "engancha" nativamente en el resumen del producto (`woocommerce_single_product_summary`), apareciendo justo después de la descripción corta o el precio (prioridad 35), sin necesidad de configuración adicional.
* **Mensaje Contextual:** Utiliza jQuery para capturar dinámicamente el título y la URL del producto actual, generando un mensaje automático tipo: *"Quiero más información sobre [Nombre Producto] [URL]"*.

### 🎨 Diseño y Usabilidad
* **Estilos Incorporados:** Incluye CSS inyectado directamente para dar formato al botón (fondo verde WhatsApp, bordes redondeados, icono), asegurando que se vea bien en cualquier tema sin archivos CSS externos pesados.
* **Iconografía:** Carga automáticamente la librería **FontAwesome** para mostrar el icono oficial de WhatsApp.

## 📂 Estructura del Plugin

* `whatsapp-buttons.php`: Archivo único que contiene:
    * Inyección de estilos CSS y scripts JS.
    * Hook para WooCommerce.
    * Lógica del Shortcode.

## 🚀 Instalación

1.  Sube el archivo (o carpeta) a `/wp-content/plugins/`.
2.  Activa el plugin desde el panel de WordPress.
3.  El botón aparecerá automáticamente en todos tus productos individuales.

## ⚙️ Configuración (Hardcoded)

Este plugin no tiene panel de administración. El número de teléfono de destino está definido directamente en el código.

**Para cambiar el número de teléfono:**
1.  Abre el archivo `whatsapp-buttons.php` en el editor de plugins.
2.  Busca la sección de JavaScript (aproximadamente línea 43).
3.  Reemplaza el número `573053261914` por el tuyo en la variable `whatsappUrl`.

```javascript
var whatsappUrl = "[https://wa.me/TU_NUMERO_AQUI?text=](https://wa.me/TU_NUMERO_AQUI?text=)..."
