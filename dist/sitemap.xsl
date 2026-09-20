<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
                xmlns:html="http://www.w3.org/TR/REC-html40"
                xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
                xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
  <xsl:template match="/">
    <html lang="en">
      <head>
        <title>XML Sitemap | Piyush Gupta Portfolio</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;family=JetBrains+Mono:wght@400;500&amp;display=swap" rel="stylesheet" />
        <style type="text/css">
          :root {
            --bg-primary: #0a0d14;
            --bg-card: rgba(18, 24, 38, 0.85);
            --bg-card-hover: rgba(26, 35, 54, 0.95);
            --border: rgba(255, 255, 255, 0.08);
            --border-hover: rgba(20, 157, 221, 0.4);
            --accent: #149ddd;
            --accent-glow: rgba(20, 157, 221, 0.25);
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            --badge-green: #10b981;
            --badge-green-bg: rgba(16, 185, 129, 0.15);
            --badge-blue-bg: rgba(20, 157, 221, 0.15);
          }

          * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
          }

          body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg-primary);
            color: var(--text-primary);
            min-height: 100vh;
            padding: 2.5rem 1.5rem;
            line-height: 1.6;
            background-image: 
              radial-gradient(at 0% 0%, rgba(20, 157, 221, 0.12) 0px, transparent 50%),
              radial-gradient(at 100% 100%, rgba(139, 92, 246, 0.08) 0px, transparent 50%);
            background-attachment: fixed;
          }

          .container {
            max-width: 1100px;
            margin: 0 auto;
          }

          /* Header Section */
          .header-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem 2.25rem;
            backdrop-filter: blur(12px);
            margin-bottom: 2rem;
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
          }

          .header-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #149ddd, #6366f1, #10b981);
          }

          .brand-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1.5rem;
          }

          .title-group h1 {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 0.6rem;
          }

          .xml-pill {
            font-size: 0.75rem;
            font-family: 'JetBrains Mono', monospace;
            background: var(--badge-blue-bg);
            color: var(--accent);
            border: 1px solid rgba(20, 157, 221, 0.3);
            padding: 0.2rem 0.6rem;
            border-radius: 6px;
            font-weight: 600;
            text-transform: uppercase;
          }

          .title-group p {
            color: var(--text-secondary);
            font-size: 0.95rem;
            margin-top: 0.4rem;
          }

          .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-primary);
            text-decoration: none;
            padding: 0.65rem 1.25rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            border: 1px solid var(--border);
            transition: all 0.2s ease;
          }

          .back-btn:hover {
            background: var(--accent);
            color: #ffffff;
            border-color: var(--accent);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px var(--accent-glow);
          }

          /* Stats Grid */
          .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 1.75rem;
            padding-top: 1.75rem;
            border-top: 1px solid var(--border);
          }

          .stat-item {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1rem 1.25rem;
          }

          .stat-label {
            font-size: 0.8rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
          }

          .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            margin-top: 0.25rem;
            font-family: 'JetBrains Mono', monospace;
          }

          .stat-badge {
            display: inline-block;
            color: var(--badge-green);
            background: var(--badge-green-bg);
            border: 1px solid rgba(16, 185, 129, 0.3);
            font-size: 0.8rem;
            padding: 0.15rem 0.5rem;
            border-radius: 6px;
            font-weight: 600;
            margin-top: 0.35rem;
          }

          /* Table Card */
          .table-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            backdrop-filter: blur(12px);
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.5);
            margin-bottom: 2rem;
          }

          .table-header {
            padding: 1.25rem 1.75rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
          }

          .table-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #ffffff;
          }

          .table-responsive {
            overflow-x: auto;
          }

          table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.92rem;
          }

          th {
            background: rgba(255, 255, 255, 0.03);
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border);
          }

          td {
            padding: 1.15rem 1.5rem;
            border-bottom: 1px solid var(--border);
            color: var(--text-secondary);
            vertical-align: middle;
          }

          tr:last-child td {
            border-bottom: none;
          }

          tr:hover td {
            background: var(--bg-card-hover);
          }

          .url-link {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            word-break: break-all;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            transition: color 0.2s;
          }

          .url-link:hover {
            color: #38bdf8;
            text-decoration: underline;
          }

          .priority-tag {
            display: inline-block;
            background: var(--badge-green-bg);
            color: var(--badge-green);
            border: 1px solid rgba(16, 185, 129, 0.3);
            font-weight: 700;
            font-family: 'JetBrains Mono', monospace;
            padding: 0.25rem 0.6rem;
            border-radius: 6px;
            font-size: 0.85rem;
          }

          .freq-tag {
            display: inline-block;
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-primary);
            border: 1px solid var(--border);
            padding: 0.25rem 0.6rem;
            border-radius: 6px;
            font-size: 0.82rem;
            font-weight: 500;
            text-transform: capitalize;
          }

          .image-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            background: var(--badge-blue-bg);
            color: var(--accent);
            border: 1px solid rgba(20, 157, 221, 0.3);
            padding: 0.25rem 0.6rem;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            font-family: 'JetBrains Mono', monospace;
          }

          /* Images Gallery Section */
          .images-section {
            margin-top: 2rem;
          }

          .images-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.25rem;
            margin-top: 1rem;
          }

          .image-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            transition: all 0.2s ease;
          }

          .image-card:hover {
            border-color: var(--border-hover);
            transform: translateY(-2px);
          }

          .image-card-title {
            font-weight: 700;
            color: #ffffff;
            font-size: 0.95rem;
          }

          .image-card-caption {
            font-size: 0.85rem;
            color: var(--text-secondary);
          }

          .image-card-link {
            font-size: 0.8rem;
            font-family: 'JetBrains Mono', monospace;
            color: var(--accent);
            text-decoration: none;
            word-break: break-all;
            margin-top: auto;
            padding-top: 0.5rem;
            border-top: 1px solid var(--border);
          }

          .image-card-link:hover {
            text-decoration: underline;
          }

          /* Footer */
          .footer {
            text-align: center;
            padding: 2rem 0 1rem;
            color: var(--text-muted);
            font-size: 0.85rem;
          }

          .footer a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.2s;
          }

          .footer a:hover {
            color: var(--accent);
          }
        </style>
      </head>
      <body>
        <div class="container">
          <!-- Main Header -->
          <div class="header-card">
            <div class="brand-row">
              <div class="title-group">
                <h1>
                  XML Sitemap
                  <span class="xml-pill">Protocol 0.9</span>
                </h1>
                <p>Engineered for Googlebot, Bingbot &amp; Search Engine Indexing</p>
              </div>
              <a href="https://www.piyushguptaportfolio.online/" class="back-btn">
                <span>&#8592;</span> View Portfolio
              </a>
            </div>

            <!-- Stats Bar -->
            <div class="stats-grid">
              <div class="stat-item">
                <div class="stat-label">Indexed Webpages</div>
                <div class="stat-value">
                  <xsl:value-of select="count(sitemap:urlset/sitemap:url)"/>
                </div>
              </div>
              <div class="stat-item">
                <div class="stat-label">Indexed Media Assets</div>
                <div class="stat-value">
                  <xsl:value-of select="count(sitemap:urlset/sitemap:url/image:image)"/>
                </div>
              </div>
              <div class="stat-item">
                <div class="stat-label">Validation Status</div>
                <div class="stat-badge">&#10003; 100% Valid XML</div>
              </div>
            </div>
          </div>

          <!-- URLs Table -->
          <div class="table-card">
            <div class="table-header">
              <div class="table-title">Canonical URLs</div>
            </div>
            <div class="table-responsive">
              <table>
                <thead>
                  <tr>
                    <th>URL Location</th>
                    <th>Priority</th>
                    <th>Change Freq</th>
                    <th>Last Modified</th>
                    <th>Images</th>
                  </tr>
                </thead>
                <tbody>
                  <xsl:for-each select="sitemap:urlset/sitemap:url">
                    <tr>
                      <td>
                        <a class="url-link" href="{sitemap:loc}" target="_blank" rel="noopener">
                          <xsl:value-of select="sitemap:loc"/>
                        </a>
                      </td>
                      <td>
                        <span class="priority-tag">
                          <xsl:value-of select="sitemap:priority"/>
                        </span>
                      </td>
                      <td>
                        <span class="freq-tag">
                          <xsl:value-of select="sitemap:changefreq"/>
                        </span>
                      </td>
                      <td style="font-family: 'JetBrains Mono', monospace; font-size: 0.85rem;">
                        <xsl:value-of select="sitemap:lastmod"/>
                      </td>
                      <td>
                        <xsl:if test="count(image:image) &gt; 0">
                          <span class="image-pill">
                            &#128247; <xsl:value-of select="count(image:image)"/>
                          </span>
                        </xsl:if>
                        <xsl:if test="count(image:image) = 0">
                          <span style="color: var(--text-muted);">-</span>
                        </xsl:if>
                      </td>
                    </tr>
                  </xsl:for-each>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Structured Image Assets Section -->
          <xsl:if test="count(sitemap:urlset/sitemap:url/image:image) &gt; 0">
            <div class="images-section">
              <div class="table-card" style="padding: 1.5rem 1.75rem;">
                <div class="table-title" style="margin-bottom: 0.25rem;">
                  Indexed Rich Media &amp; Project Assets (<xsl:value-of select="count(sitemap:urlset/sitemap:url/image:image)"/>)
                </div>
                <p style="color: var(--text-secondary); font-size: 0.88rem; margin-bottom: 1rem;">
                  Google Image Search crawler metadata embedded directly in sitemap.
                </p>

                <div class="images-grid">
                  <xsl:for-each select="sitemap:urlset/sitemap:url/image:image">
                    <div class="image-card">
                      <div class="image-card-title">
                        <xsl:value-of select="image:title"/>
                      </div>
                      <div class="image-card-caption">
                        <xsl:value-of select="image:caption"/>
                      </div>
                      <a class="image-card-link" href="{image:loc}" target="_blank" rel="noopener">
                        <xsl:value-of select="image:loc"/>
                      </a>
                    </div>
                  </xsl:for-each>
                </div>
              </div>
            </div>
          </xsl:if>

          <!-- Footer -->
          <div class="footer">
            <p>
              Generated for <a href="https://www.piyushguptaportfolio.online/" target="_blank">Piyush Gupta Portfolio</a> &#8226; Full Stack Developer &amp; AI Engineer
            </p>
          </div>
        </div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
